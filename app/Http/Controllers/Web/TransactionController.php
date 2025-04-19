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
            if ($request->ajax()) {
                return response()->json(['success' => false, 'error' => $validator->errors()->first()], 422);
            }
            return redirect()->back()->withErrors($validator);
        }

        $user = Auth::user();
        $reservation = $this->reservationRepository->find($request->reservation_id);
        
        if (!$reservation) {
            if ($request->ajax()) {
                return response()->json(['success' => false, 'error' => 'Reservation not found'], 404);
            }
            return redirect()->route('reservations.index')->with('error', 'Reservation not found');
        }

        if ($reservation->traveler_id !== $user->id) {
            if ($request->ajax()) {
                return response()->json(['success' => false, 'error' => 'Unauthorized access'], 403);
            }
            return redirect()->route('reservations.index')->with('error', 'Unauthorized access');
        }

        if ($reservation->status !== 'pending') {
            if ($request->ajax()) {
                return response()->json(['success' => false, 'error' => 'This reservation cannot be paid for'], 400);
            }
            return redirect()->route('reservations.show', $reservation->id)->with('error', 'This reservation cannot be paid for');
        }

        $existingTransaction = $this->transactionRepository->getTransactionsByReservation($reservation->id);
        if ($existingTransaction) {
            if ($request->ajax()) {
                return response()->json(['success' => false, 'error' => 'Payment already processed for this reservation'], 400);
            }
            return redirect()->route('reservations.show', $reservation->id)->with('error', 'Payment already processed for this reservation');
        }

        Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            $paymentIntent = PaymentIntent::create([
                'amount' => $reservation->total_price * 100,
                'currency' => 'usd', // Changed from 'mad' to 'usd' for wider compatibility
                'metadata' => [
                    'reservation_id' => $reservation->id,
                    'property_id' => $reservation->property_id,
                    'traveler_id' => $user->id,
                ],
            ]);

            $transaction = $this->transactionRepository->create([
                'reservation_id' => $reservation->id,
                'amount' => $reservation->total_price,
                'payment_method' => 'stripe',
                'payment_id' => $paymentIntent->id,
                'status' => 'pending',
            ]);

            // For demonstration purposes, we'll simulate a successful payment
            // In a real application, this would be confirmed by Stripe webhook
            
            // Update the transaction and reservation status
            $this->transactionRepository->update($transaction->id, [
                'status' => 'completed'
            ]);

            $this->reservationRepository->update($reservation->id, [
                'status' => 'confirmed'
            ]);
            
            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Payment confirmed successfully! Your reservation is now confirmed.',
                    'reservation_id' => $reservation->id
                ]);
            }

            return redirect()->route('reservations.show', $reservation->id)
                ->with('success', 'Payment confirmed successfully! Your reservation is now confirmed.');
            
        } catch (\Exception $e) {
            if ($request->ajax()) {
                return response()->json(['success' => false, 'error' => 'Error creating payment: ' . $e->getMessage()], 500);
            }
            return redirect()->route('reservations.show', $reservation->id)
                ->with('error', 'Error creating payment: ' . $e->getMessage());
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