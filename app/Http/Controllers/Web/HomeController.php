<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Repositories\PropertyRepository;
use App\Repositories\PropertyImageRepository;
use Illuminate\Http\Request;

class HomeController extends Controller{
    protected $propertyRepository;
    protected $propertyImageRepository;

    public function __construct(PropertyRepository $propertyRepository,PropertyImageRepository $propertyImageRepository) {
        $this->propertyRepository = $propertyRepository;$this->propertyImageRepository = $propertyImageRepository;
    }

    public function index(){
        
        $properties = $this->propertyRepository->getAvailableProperties();

        $properties = $properties->take(6);

        foreach ($properties as $property) {
            $property->main_image = $this->propertyImageRepository->getMainImage($property->id);
            $property->avg_rating = $property->getAverageRatingAttribute();
        }

        $popularCities = [
            ['name' => 'New York', 'count' => 215],
            ['name' => 'Paris', 'count' => 189],
            ['name' => 'Tokyo', 'count' => 142],
            ['name' => 'Rome', 'count' => 105]
        ];

        return view('home', compact('properties', 'popularCities'));
    }
}