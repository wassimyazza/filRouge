<?php

namespace App\Repositories;

use App\Models\Review;

class ReviewRepository extends BaseRepository
{
    public function __construct(Review $model){
        parent::__construct($model);
    }

    public function getReviewsByProperty($propertyId){
        return $this->model->where('property_id', $propertyId)->where('is_approved', true)->get();
    }

    public function findByReservationAndTraveler($reservationId, $travelerId){
        return $this->model->where('reservation_id', $reservationId)->where('traveler_id', $travelerId)->first();
    }

    public function getPendingReviews(){
        return $this->model->where('is_approved', false)->get();
    }
}