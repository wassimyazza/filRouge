<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\ReviewRepository;
use App\Repositories\ReservationRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    protected $reviewRepository;
    protected $reservationRepository;

    public function __construct(ReviewRepository $reviewRepository,ReservationRepository $reservationRepository) {
        $this->reviewRepository = $reviewRepository;
        $this->reservationRepository = $reservationRepository;
    }

    public function index($propertyId){
        $reviews = $this->reviewRepository->getReviewsByProperty($propertyId);
        
        foreach ($reviews as $review) {
            $review->traveler_name = $review->traveler->name;
            $review->traveler_image = $review->traveler->profile_image;
        }

        return response()->json(['reviews' => $reviews]);
    }

}