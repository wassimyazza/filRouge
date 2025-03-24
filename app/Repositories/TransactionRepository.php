<?php

namespace App\Repositories;

use App\Models\Transaction;

class TransactionRepository extends BaseRepository
{
    public function __construct(Transaction $model){
        parent::__construct($model);
    }

    public function getTransactionsByStatus($status){
        return $this->model->where('status', $status)->get();
    }

    public function getTransactionsByReservation($reservationId){
        return $this->model->where('reservation_id', $reservationId)->first();
    }
}