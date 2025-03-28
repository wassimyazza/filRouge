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

    public function store(Request $request){
        $user = Auth::user();
        
        if (!$user->isTraveler()) {
            return response()->json(['message' => 'Only travelers can leave reviews'], 403);
        }

        $validator = Validator::make($request->all(), [
            'reservation_id' => 'required|exists:reservations,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:1000',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $reservation = $this->reservationRepository->find($request->reservation_id);
        
        if (!$reservation) {
            return response()->json(['message' => 'Reservation not found'], 404);
        }

        if ($reservation->traveler_id !== $user->id) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        if ($reservation->status !== 'completed') {
            return response()->json(['message' => 'Can only review completed reservations'], 400);
        }

        $existingReview = $this->reviewRepository->findByReservationAndTraveler($reservation->id, $user->id);


        if ($existingReview) {
            return response()->json(['message' => 'You have already reviewed this reservation'], 400);
        }

        $review = $this->reviewRepository->create([
            'property_id' => $reservation->property_id,
            'reservation_id' => $reservation->id,
            'traveler_id' => $user->id,
            'rating' => $request->rating,
            'comment' => $request->comment,
            'is_approved' => false,
        ]);

        return response()->json([
            'message' => 'Review submitted successfully and pending approval',
            'review' => $review
        ], 201);
    }

    public function destroy($id){
        $user = Auth::user();
        $review = $this->reviewRepository->find($id);
        
        if (!$review) {
            return response()->json(['message' => 'Review not found'], 404);
        }

        if (!$user->isAdmin() && $review->traveler_id !== $user->id) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $this->reviewRepository->delete($id);

        return response()->json(['message' => 'Review deleted successfully']);
    }


    public function approve($id){
        $user = Auth::user();
        
        if (!$user->isAdmin()) {
            return response()->json(['message' => 'Only admins can approve reviews'], 403);
        }

        $review = $this->reviewRepository->find($id);
        
        if (!$review) {
            return response()->json(['message' => 'Review not found'], 404);
        }

        $this->reviewRepository->update($id, [
            'is_approved' => true
        ]);

        return response()->json([
            'message' => 'Review approved successfully',
            'review' => $this->reviewRepository->find($id)
        ]);
    }



}