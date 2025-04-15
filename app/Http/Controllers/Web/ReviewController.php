<?php

namespace App\Http\Controllers\Web;

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
            return redirect()->route('reservations.index')
                ->with('error', 'Only travelers can leave reviews');
        }

        $validator = Validator::make($request->all(), [
            'reservation_id' => 'required|exists:reservations,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:1000',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $reservation = $this->reservationRepository->find($request->reservation_id);
        
        if (!$reservation) {
            return redirect()->route('reservations.index')
                ->with('error', 'Reservation not found');
        }

        if ($reservation->traveler_id !== $user->id) {
            return redirect()->route('reservations.index')
                ->with('error', 'Unauthorized access');
        }

        if ($reservation->status !== 'completed') {
            return redirect()->route('reservations.index')
                ->with('error', 'Can only review completed reservations');
        }

        $existingReview = $this->reviewRepository->findByReservationAndTraveler($reservation->id, $user->id);

        if ($existingReview) {
            return redirect()->route('reservations.index')
                ->with('error', 'You have already reviewed this reservation');
        }

        $this->reviewRepository->create([
            'property_id' => $reservation->property_id,
            'reservation_id' => $reservation->id,
            'traveler_id' => $user->id,
            'rating' => $request->rating,
            'comment' => $request->comment,
            'is_approved' => false,
        ]);

        return redirect()->route('properties.show', $reservation->property_id)
            ->with('success', 'Review submitted successfully and pending approval');
    }

    public function destroy($id){
        $user = Auth::user();
        $review = $this->reviewRepository->find($id);
        
        if (!$review) {
            return redirect()->back()
                ->with('error', 'Review not found');
        }

        if (!$user->isAdmin() && $review->traveler_id !== $user->id) {
            return redirect()->back()
                ->with('error', 'Unauthorized access');
        }

        $this->reviewRepository->delete($id);

        return redirect()->back()
            ->with('success', 'Review deleted successfully');
    }


    public function approve($id){
        $user = Auth::user();
        
        if (!$user->isAdmin()) {
            return redirect()->route('home')
                ->with('error', 'Unauthorized access');
        }

        $review = $this->reviewRepository->find($id);
        
        if (!$review) {
            return redirect()->route('admin.reviews.pending')
                ->with('error', 'Review not found');
        }

        $this->reviewRepository->update($id, [
            'is_approved' => true
        ]);

        return redirect()->route('admin.reviews.pending')
            ->with('success', 'Review approved successfully');
    }


    public function getPendingReviews(){
        $user = Auth::user();
        
        if (!$user->isAdmin()) {
            return redirect()->route('home')
                ->with('error', 'Unauthorized access');
        }

        $reviews = $this->reviewRepository->getPendingReviews();
        
        foreach ($reviews as $review) {
            $review->traveler_name = $review->traveler->name;
            $review->property_title = $review->property->title;
        }

        return view('admin.reviews', compact('reviews'));
    }

    public function create($reservationId){
        $user = Auth::user();
        
        if (!$user->isTraveler()) {
            return redirect()->route('reservations.index')
                ->with('error', 'Only travelers can leave reviews');
        }

        $reservation = $this->reservationRepository->find($reservationId);
        
        if (!$reservation) {
            return redirect()->route('reservations.index')
                ->with('error', 'Reservation not found');
        }

        if ($reservation->traveler_id !== $user->id) {
            return redirect()->route('reservations.index')
                ->with('error', 'Unauthorized access');
        }

        if ($reservation->status !== 'completed') {
            return redirect()->route('reservations.index')
                ->with('error', 'Can only review completed reservations');
        }

        $existingReview = $this->reviewRepository->findByReservationAndTraveler($reservation->id, $user->id);

        if ($existingReview) {
            return redirect()->route('reservations.index')
                ->with('error', 'You have already reviewed this reservation');
        }

        return view('reviews.create', compact('reservation'));
    }

}