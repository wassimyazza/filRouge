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

    /**
     * Get all reservations for a specific property with specific statuses
     *
     * @param int $propertyId
     * @param array $statuses
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getReservationsByProperty($propertyId, $statuses = ['confirmed', 'pending']){
        return $this->model
            ->where('property_id', $propertyId)
            ->whereIn('status', $statuses)
            ->get();
    }

    /**
     * Check if a property is available for the given dates
     *
     * @param int $propertyId
     * @param string $checkInDate
     * @param string $checkOutDate
     * @return bool
     */
    public function checkAvailability($propertyId, $checkInDate, $checkOutDate){
        $checkIn = Carbon::parse($checkInDate);
        $checkOut = Carbon::parse($checkOutDate);

        $conflictingReservations = $this->model->where('property_id', $propertyId)
            ->where('status', '!=', 'cancelled')
            ->where(function ($query) use ($checkIn, $checkOut) {
                $query->whereBetween('check_in_date', [$checkIn, $checkOut])
                    ->orWhereBetween('check_out_date', [$checkIn, $checkOut])
                    ->orWhere(function ($q) use ($checkIn, $checkOut) {
                        $q->where('check_in_date', '<=', $checkIn)
                          ->where('check_out_date', '>=', $checkOut);
                    });
            })->count();

        return $conflictingReservations === 0;
    }

    /**
     * Get all booked dates for a property
     *
     * @param int $propertyId
     * @return array
     */
    public function getBookedDatesForProperty($propertyId){
        $reservations = $this->model
            ->where('property_id', $propertyId)
            ->where('status', '!=', 'cancelled')
            ->get();
        
        $bookedDates = [];
        
        foreach ($reservations as $reservation) {
            $checkIn = Carbon::parse($reservation->check_in_date);
            $checkOut = Carbon::parse($reservation->check_out_date);
            
            $bookedDates[] = [
                'check_in_date' => $checkIn->format('Y-m-d'),
                'check_out_date' => $checkOut->format('Y-m-d')
            ];
        }
        
        return $bookedDates;
    }
}