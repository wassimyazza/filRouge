<?php

namespace App\Repositories;

use App\Models\Property;

class PropertyRepository extends BaseRepository
{
    public function __construct(Property $model){

        parent::__construct($model);
    }

    public function getAvailableProperties(){

        return $this->model->where('is_available', true)->where('is_approved', true)->get();
    }

    public function searchProperties($filters){

        $query = $this->model->where('is_available', true)->where('is_approved', true);

        if (isset($filters['city'])) {
            $query->where('city', $filters['city']);
        }

        if (isset($filters['capacity'])) {
            $query->where('capacity', '>=', $filters['capacity']);
        }

        if (isset($filters['min_price'])) {
            $query->where('price_per_night', '>=', $filters['min_price']);
        }

        if (isset($filters['max_price'])) {
            $query->where('price_per_night', '<=', $filters['max_price']);
        }

        return $query->get();
    }
}