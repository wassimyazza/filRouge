<?php

namespace App\Repositories;

use App\Models\Withdrawal;

class WithdrawalRepository extends BaseRepository{


    public function __construct(Withdrawal $model){
        parent::__construct($model);
    }

    public function getWithdrawalsByHost($hostId){
        return $this->model->where('host_id', $hostId)->get();
    }

}