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

    public function checkAvailability($propertyId, $checkInDate, $checkOutDate){
        $checkIn = Carbon::parse($checkInDate);
        $checkOut = Carbon::parse($checkOutDate);

        $conflictingReservations = $this->model->where('property_id', $propertyId)->where('status', '!=', 'cancelled')->where(function ($query) use ($checkIn, $checkOut) {
                $query->whereBetween('check_in_date', [$checkIn, $checkOut])->orWhereBetween('check_out_date', [$checkIn, $checkOut])->orWhere(function ($q) use ($checkIn, $checkOut) {
                        $q->where('check_in_date', '<=', $checkIn)->where('check_out_date', '>=', $checkOut);
                    });
            })->count();

        return $conflictingReservations === 0;
    }

}