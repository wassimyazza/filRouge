<?php

namespace App\Repositories;

use App\Models\Reservation;
use Carbon\Carbon;

class ReservationRepository extends BaseRepository{

    public function __construct(Reservation $model){
        parent::__construct($model);
    }
    
}