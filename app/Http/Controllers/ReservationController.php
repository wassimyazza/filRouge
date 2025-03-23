<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\ReservationRepository;
use App\Repositories\PropertyRepository;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ReservationController extends Controller{

    protected $reservationRepository;
    protected $propertyRepository;
    protected $transactionRepository;

    public function __construct(ReservationRepository $reservationRepository,PropertyRepository $propertyRepository,) {
        $this->reservationRepository = $reservationRepository;
        $this->propertyRepository = $propertyRepository;
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

    public function show($id)
    {
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

        return response()->json(['reservation' => $reservation]);
    }

}
