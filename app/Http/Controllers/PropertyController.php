<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\PropertyRepository;
use App\Repositories\PropertyImageRepository;

class PropertyController extends Controller
{
    protected $propertyRepository;
    protected $propertyImageRepository;

    public function __construct(PropertyRepository $propertyRepository,PropertyImageRepository $propertyImageRepository) {
        $this->propertyRepository = $propertyRepository;
        $this->propertyImageRepository = $propertyImageRepository;
    }

    public function index(Request $request){
        $filters = $request->only(['city', 'capacity', 'min_price', 'max_price']);
        
        if (!empty($filters)) {
            $properties = $this->propertyRepository->searchProperties($filters);
        } else {
            $properties = $this->propertyRepository->getAvailableProperties();
        }

        return response()->json(['properties' => $properties]);
    }
}
