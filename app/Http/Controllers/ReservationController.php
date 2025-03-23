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

}
