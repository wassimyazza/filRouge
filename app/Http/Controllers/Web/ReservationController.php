<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Repositories\ReservationRepository;
use App\Repositories\PropertyRepository;
use App\Repositories\TransactionRepository;
use App\Repositories\PropertyImageRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class ReservationController extends Controller{
    protected $reservationRepository;
    protected $propertyRepository;
    protected $transactionRepository;
    protected $propertyImageRepository;

    public function __construct(ReservationRepository $reservationRepository,PropertyRepository $propertyRepository,TransactionRepository $transactionRepository,PropertyImageRepository $propertyImageRepository) {
        $this->reservationRepository = $reservationRepository;
        $this->propertyRepository = $propertyRepository;
        $this->transactionRepository = $transactionRepository;
        $this->propertyImageRepository = $propertyImageRepository;
    }

    public function index(){
        $user = Auth::user();
        
        if ($user->isTraveler()) {
            $reservations = $this->reservationRepository->getReservationsByTraveler($user->id);
        } elseif ($user->isHost()) {
            return redirect()->route('host.reservations');
        } elseif ($user->isAdmin()) {
            $reservations = $this->reservationRepository->all();
        } else {
            return redirect()->route('home')
                ->with('error', 'Unauthorized access');
        }

        foreach ($reservations as $reservation) {
            $reservation->property = $reservation->property;
            $reservation->property->main_image = $this->propertyImageRepository->getMainImage($reservation->property->id);
        }

        return view('reservations.index', compact('reservations'));
    }

    public function hostReservations(){
        $user = Auth::user();
        
        if (!$user->isHost()) {
            return redirect()->route('home')
                ->with('error', 'Only hosts can access this page');
        }
        
        $reservations = $this->reservationRepository->getReservationsByHost($user->id);
        
        foreach ($reservations as $reservation) {
            $reservation->property = $reservation->property;
            $reservation->traveler = $reservation->traveler;
        }
        
        return view('reservations.host-index', compact('reservations'));
    }

    public function show($id){
        $user = Auth::user();
        $reservation = $this->reservationRepository->find($id);
        
        if (!$reservation) {
            return redirect()->route('reservations.index')
                ->with('error', 'Reservation not found');
        }

        if ($user->isTraveler() && $reservation->traveler_id !== $user->id) {
            return redirect()->route('reservations.index')
                ->with('error', 'Unauthorized access');
        }

        if ($user->isHost() && $reservation->property->host_id !== $user->id) {
            return redirect()->route('host.reservations')
                ->with('error', 'Unauthorized access');
        }

        $reservation->property = $reservation->property;
        $reservation->property->main_image = $this->propertyImageRepository->getMainImage($reservation->property->id);
        $reservation->traveler = $reservation->traveler;
        $reservation->transaction = $reservation->transaction;

        return view('reservations.show', compact('reservation'));
    }

    public function store(Request $request){
        $user = Auth::user();
        
        if (!$user->isTraveler()) {
            return redirect()->route('properties.index')
                ->with('error', 'Only travelers can make reservations');
        }

        $validator = Validator::make($request->all(), [
            'property_id' => 'required|exists:properties,id',
            'check_in_date' => 'required|date|after_or_equal:today',
            'check_out_date' => 'required|date|after:check_in_date',
            'guests_count' => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $property = $this->propertyRepository->find($request->property_id);
        
        if (!$property) {
            return redirect()->route('properties.index')
                ->with('error', 'Property not found');
        }

        if (!$property->is_available || !$property->is_approved) {
            return redirect()->route('properties.show', $property->id)
                ->with('error', 'Property is not available for booking');
        }

        if ($property->capacity < $request->guests_count) {
            return redirect()->back()
                ->withErrors(['guests_count' => 'Property capacity exceeded'])
                ->withInput();
        }

        $isAvailable = $this->reservationRepository->checkAvailability(
            $request->property_id,
            $request->check_in_date,
            $request->check_out_date
        );

        if (!$isAvailable) {
            return redirect()->back()
                ->withErrors(['check_in_date' => 'Property is not available for the selected dates'])
                ->withInput();
        }

        $checkIn = Carbon::parse($request->check_in_date);
        $checkOut = Carbon::parse($request->check_out_date);
        $nights = $checkIn->diffInDays($checkOut);
        $totalPrice = $property->price_per_night * $nights;

        $reservation = $this->reservationRepository->create([
            'property_id' => $request->property_id,
            'traveler_id' => $user->id,
            'check_in_date' => $request->check_in_date,
            'check_out_date' => $request->check_out_date,
            'guests_count' => $request->guests_count,
            'total_price' => $totalPrice,
            'status' => 'pending', // Initial status
        ]);

        return redirect()->route('payment.checkout', $reservation->id)
        ->with('success', 'Reservation created successfully. Please complete payment to confirm your booking.');
    }

    public function update(Request $request, $id){
        $user = Auth::user();
        $reservation = $this->reservationRepository->find($id);
        
        if (!$reservation) {
            return response()->json(['message' => 'Reservation not found'], 404);
        }

        if (!$user->isAdmin() && 
            !($user->isHost() && $reservation->property->host_id === $user->id)) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $validator = Validator::make($request->all(), [
            'status' => 'required|in:confirmed,cancelled',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        if ($reservation->status !== 'pending') {
            return response()->json([
                'message' => 'Only pending reservations can be updated'
            ], 400);
        }

        $this->reservationRepository->update($id, [
            'status' => $request->status
        ]);

        if ($request->status === 'cancelled') {
            $transaction = $this->transactionRepository->getTransactionsByReservation($id);
            if ($transaction && $transaction->status === 'completed') {
                $this->transactionRepository->update($transaction->id, [
                    'status' => 'refunded'
                ]);
            }
        }

        return response()->json([
            'message' => 'Reservation status updated successfully',
            'reservation' => $this->reservationRepository->find($id)
        ]);
    }

    public function cancel($id){
        $user = Auth::user();
        $reservation = $this->reservationRepository->find($id);
        
        if (!$reservation) {
            return response()->json(['message' => 'Reservation not found'], 404);
        }

        if ($reservation->traveler_id !== $user->id) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        if ($reservation->status !== 'pending') {
            return response()->json([
                'message' => 'Only pending reservations can be cancelled'
            ], 400);
        }

        $this->reservationRepository->update($id, [
            'status' => 'cancelled'
        ]);

        $transaction = $this->transactionRepository->getTransactionsByReservation($id);
        if ($transaction && $transaction->status === 'completed') {
            $this->transactionRepository->update($transaction->id, [
                'status' => 'refunded'
            ]);
        }

        return response()->json([
            'message' => 'Reservation cancelled successfully'
        ]);
    }

    public function create($propertyId){
        $user = Auth::user();
        
        if (!$user->isTraveler()) {
            return redirect()->route('properties.show', $propertyId)
                ->with('error', 'Only travelers can make reservations');
        }

        $property = $this->propertyRepository->find($propertyId);
        
        if (!$property) {
            return redirect()->route('properties.index')
                ->with('error', 'Property not found');
        }

        if (!$property->is_available || !$property->is_approved) {
            return redirect()->route('properties.show', $propertyId)
                ->with('error', 'Property is not available for booking');
        }

        $property->main_image = $this->propertyImageRepository->getMainImage($property->id);

        return view('reservations.create', compact('property'));
    }
}