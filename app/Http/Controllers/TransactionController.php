<?php

namespace App\Http\Controllers;

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
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        return response()->json(['transactions' => $transactions]);
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
            // Create a PaymentIntent
            $paymentIntent = PaymentIntent::create([
                'amount' => $reservation->total_price * 100, // Amount in cents
                'currency' => 'mad', // Moroccan Dirham
                'metadata' => [
                    'reservation_id' => $reservation->id,
                    'property_id' => $reservation->property_id,
                    'traveler_id' => $user->id,
                ],
            ]);

            // Create transaction record
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


}