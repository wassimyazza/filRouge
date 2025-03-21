<?php

namespace App\Repositories;

use App\Models\PropertyImage;

class PropertyImageRepository extends BaseRepository{
    
    public function __construct(PropertyImage $model){
        parent::__construct($model);
    }

}