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
}