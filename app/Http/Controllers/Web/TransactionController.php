<?php

namespace App\Http\Controllers\Web;

use Stripe\Stripe;
use Stripe\PaymentIntent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Repositories\ReservationRepository;
use App\Repositories\TransactionRepository;

class TransactionController extends Controller
{
    protected $transactionRepository;
    protected $reservationRepository;

    public function __construct(TransactionRepository $transactionRepository,ReservationRepository $reservationRepository) {
        $this->transactionRepository = $transactionRepository;
        $this->reservationRepository = $reservationRepository;
    }

    public function getTransactions(){
        $user = Auth::user();
        
        if ($user->isAdmin()) {
            $transactions = $this->transactionRepository->all();
        } elseif ($user->isHost()) {
            $transactions = [];
            $reservations = $this->reservationRepository->getReservationsByHost($user->id);
            
            foreach ($reservations as $reservation) {
                $transaction = $this->transactionRepository->getTransactionsByReservation($reservation->id);
                if ($transaction) {
                    $transactions[] = $transaction;
                }
            }
        } elseif ($user->isTraveler()) {
            $transactions = [];
            $reservations = $this->reservationRepository->getReservationsByTraveler($user->id);
            
            foreach ($reservations as $reservation) {
                $transaction = $this->transactionRepository->getTransactionsByReservation($reservation->id);
                if ($transaction) {
                    $transactions[] = $transaction;
                }
            }
        } else {
            return redirect()->route('home')
                ->with('error', 'Unauthorized access');
        }

        // Add related data
        foreach ($transactions as $transaction) {
            if ($transaction->reservation) {
                $transaction->reservation->property = $transaction->reservation->property;
            }
        }

        return view('transactions.index', compact('transactions'));
    }

    public function createPaymentIntent(Request $request){
        $validator = Validator::make($request->all(), [
            'reservation_id' => 'required|exists:reservations,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'error' => $validator->errors()->first()], 422);
        }

        $user = Auth::user();
        $reservation = $this->reservationRepository->find($request->reservation_id);

        if (!$reservation || $reservation->traveler_id !== $user->id || $reservation->status !== 'pending') {
            return response()->json(['success' => false, 'error' => 'Invalid reservation or access denied.'], 403);
        }

        $existingTransaction = $this->transactionRepository->getTransactionsByReservation($reservation->id);
        if ($existingTransaction) {
            return response()->json(['success' => false, 'error' => 'Payment already processed.'], 400);
        }

        Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            $paymentIntent = PaymentIntent::create([
                'amount' => $reservation->total_price * 100, // cents
                'currency' => 'usd',
                'payment_method_types' => ['card'],
                'metadata' => [
                    'reservation_id' => $reservation->id,
                    'traveler_id' => $user->id,
                ],
            ]);

            // Store transaction
            $transaction = $this->transactionRepository->create([
                'reservation_id' => $reservation->id,
                'amount' => $reservation->total_price,
                'payment_method' => 'stripe',
                'payment_id' => $paymentIntent->id,
                'status' => 'pending',
            ]);

            // Simulate successful payment (test mode shortcut)
            $this->transactionRepository->update($transaction->id, ['status' => 'completed']);
            $this->reservationRepository->update($reservation->id, ['status' => 'confirmed']);

            return response()->json([
                'success' => true,
                'message' => 'Fake payment successful (Stripe test mode).',
                'reservation_id' => $reservation->id
            ]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }


    public function confirmPayment(Request $request) {
        $validator = Validator::make($request->all(), [
            'payment_intent_id' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator);
        }

        Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            $paymentIntent = PaymentIntent::retrieve($request->payment_intent_id);
            
            $transaction = $this->transactionRepository->findByPaymentId($request->payment_intent_id);
            
            if (!$transaction) {
                return redirect()->route('reservations.index')
                    ->with('error', 'Transaction not found');
            }
            
            $reservation_id = $transaction->reservation_id;

            $this->transactionRepository->update($transaction->id, [
                'status' => 'completed'
            ]);

            $this->reservationRepository->update($reservation_id, [
                'status' => 'confirmed'
            ]);

            return redirect()->route('reservations.show', $reservation_id)
                ->with('success', 'Payment confirmed successfully! Your reservation is now confirmed.');
        } catch (\Exception $e) {
            return redirect()->route('reservations.index')
                ->with('error', 'Error confirming payment: ' . $e->getMessage());
        }
    }

    public function showCheckoutPage($reservationId){
        $user = Auth::user();
        $reservation = $this->reservationRepository->find($reservationId);

        if (!$reservation || $reservation->traveler_id !== $user->id || $reservation->status !== 'pending') {
            return redirect()->route('reservations.index')->with('error', 'Unauthorized or invalid reservation');
        }

        $existingTransaction = $this->transactionRepository->getTransactionsByReservation($reservation->id);
        if ($existingTransaction) {
            return redirect()->route('reservations.show', $reservation->id)
                ->with('error', 'Payment already completed for this reservation');
        }

        return view('payments.checkout', compact('reservation'));
    }

}