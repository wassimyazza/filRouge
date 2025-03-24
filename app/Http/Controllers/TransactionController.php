<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\TransactionRepository;
use App\Repositories\ReservationRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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


}