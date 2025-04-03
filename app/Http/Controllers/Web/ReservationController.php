<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\ReservationRepository;
use App\Repositories\PropertyRepository;
use App\Repositories\TransactionRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class ReservationController extends Controller{
    protected $reservationRepository;
    protected $propertyRepository;
    protected $transactionRepository;

    public function __construct(ReservationRepository $reservationRepository,PropertyRepository $propertyRepository,TransactionRepository $transactionRepository) {
        $this->reservationRepository = $reservationRepository;
        $this->propertyRepository = $propertyRepository;
        $this->transactionRepository = $transactionRepository;
    }

    public function index(){
        $user = Auth::user();
        
        if ($user->isTraveler()) {
            $reservations = $this->reservationRepository->getReservationsByTraveler($user->id);
        } elseif ($user->isHost()) {
            $reservations = $this->reservationRepository->getReservationsByHost($user->id);
        } elseif ($user->isAdmin()) {
            $reservations = $this->reservationRepository->all();
        } else {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        foreach ($reservations as $reservation) {
            $reservation->property = $reservation->property;
            $reservation->traveler = $reservation->traveler;
            $reservation->transaction = $reservation->transaction;
        }

        return response()->json(['reservations' => $reservations]);
    }

    public function show($id){
        $user = Auth::user();
        $reservation = $this->reservationRepository->find($id);
        
        if (!$reservation) {
            return response()->json(['message' => 'Reservation not found'], 404);
        }

        if ($user->isTraveler() && $reservation->traveler_id !== $user->id) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        if ($user->isHost() && $reservation->property->host_id !== $user->id) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $reservation->property = $reservation->property;
        $reservation->traveler = $reservation->traveler;
        $reservation->transaction = $reservation->transaction;

        return response()->json(['reservation' => $reservation]);
    }

    public function store(Request $request){
        $user = Auth::user();
        
        if (!$user->isTraveler()) {
            return response()->json(['message' => 'Only travelers can make reservations'], 403);
        }

        $validator = Validator::make($request->all(), [
            'property_id' => 'required|exists:properties,id',
            'check_in_date' => 'required|date|after_or_equal:today',
            'check_out_date' => 'required|date|after:check_in_date',
            'guests_count' => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $property = $this->propertyRepository->find($request->property_id);
        
        if (!$property) {
            return response()->json(['message' => 'Property not found'], 404);
        }

        if (!$property->is_available || !$property->is_approved) {
            return response()->json(['message' => 'Property is not available for booking'], 400);
        }

        if ($property->capacity < $request->guests_count) {
            return response()->json(['message' => 'Property capacity exceeded'], 400);
        }

        $isAvailable = $this->reservationRepository->checkAvailability(
            $request->property_id,
            $request->check_in_date,
            $request->check_out_date
        );

        if (!$isAvailable) {
            return response()->json(['message' => 'Property is not available for the selected dates'], 400);
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

        return response()->json([
            'message' => 'Reservation created successfully',
            'reservation' => $reservation,
            'payment_required' => true
        ], 201);
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
}