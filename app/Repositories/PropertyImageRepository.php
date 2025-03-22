<?php

namespace App\Repositories;

use App\Models\PropertyImage;

class PropertyImageRepository extends BaseRepository{
    
    public function __construct(PropertyImage $model){
        parent::__construct($model);
    }

    public function getImagesByProperty($propertyId){
        return $this->model->where('property_id', $propertyId)->get();
    }

    public function getMainImage($propertyId){
        return $this->model->where('property_id', $propertyId)->where('is_main', true)->first();
    }

}