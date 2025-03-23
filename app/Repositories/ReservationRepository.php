<?php

namespace App\Repositories;


use Carbon\Carbon;
use App\Models\Reservations;

class ReservationRepository extends BaseRepository{

    public function __construct(Reservations $model){
        parent::__construct($model);
    }

    public function getReservationsByTraveler($travelerId){
        return $this->model->where('traveler_id', $travelerId)->get();
    }

    public function getReservationsByHost($hostId){
        return $this->model->whereHas('property', function ($query) use ($hostId) {
            $query->where('host_id', $hostId);
        })->get();
    }

}