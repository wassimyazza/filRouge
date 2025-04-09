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
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = Auth::user();
        $reservation = $this->reservationRepository->find($request->reservation_id);
        
        if (!$reservation) {
            return response()->json(['message' => 'Reservation not found'], 404);
        }

        if ($reservation->traveler_id !== $user->id) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        if ($reservation->status !== 'pending') {
            return response()->json(['message' => 'This reservation cannot be paid for'], 400);
        }

        $existingTransaction = $this->transactionRepository->getTransactionsByReservation($reservation->id);
        if ($existingTransaction) {
            return response()->json(['message' => 'Payment already processed for this reservation'], 400);
        }

        Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            $paymentIntent = PaymentIntent::create([
                'amount' => $reservation->total_price * 100,
                'currency' => 'mad',
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

            return response()->json([
                'clientSecret' => $paymentIntent->client_secret,
                'transaction' => $transaction
            ]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error creating payment: ' . $e->getMessage()], 500);
        }
    }


    public function confirmPayment(Request $request){
        $validator = Validator::make($request->all(), [
            'payment_intent_id' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            $paymentIntent = PaymentIntent::retrieve($request->payment_intent_id);
            
            if ($paymentIntent->status !== 'succeeded') {
                return response()->json(['message' => 'Payment not successful'], 400);
            }

            $transaction = $this->transactionRepository->getTransactionsByReservation(
                $paymentIntent->metadata->reservation_id
            );

            if (!$transaction) {
                return response()->json(['message' => 'Transaction not found'], 404);
            }

            $this->transactionRepository->update($transaction->id, [
                'status' => 'completed'
            ]);

            $this->reservationRepository->update($paymentIntent->metadata->reservation_id, [
                'status' => 'confirmed'
            ]);

            return response()->json([
                'message' => 'Payment confirmed successfully',
                'transaction' => $this->transactionRepository->find($transaction->id)
            ]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error confirming payment: ' . $e->getMessage()], 500);
        }
    }


}