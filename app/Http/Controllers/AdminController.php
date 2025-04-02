<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use App\Repositories\PropertyRepository;
use App\Repositories\ReservationRepository;
use App\Repositories\ReviewRepository;
use App\Repositories\TransactionRepository;
use App\Repositories\WithdrawalRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    protected $userRepository;
    protected $propertyRepository;
    protected $reservationRepository;
    protected $reviewRepository;
    protected $transactionRepository;
    protected $withdrawalRepository;

    public function __construct(UserRepository $userRepository,PropertyRepository $propertyRepository,ReservationRepository $reservationRepository,ReviewRepository $reviewRepository,TransactionRepository $transactionRepository,WithdrawalRepository $withdrawalRepository) {
        $this->userRepository = $userRepository;
        $this->propertyRepository = $propertyRepository;
        $this->reservationRepository = $reservationRepository;
        $this->reviewRepository = $reviewRepository;
        $this->transactionRepository = $transactionRepository;
        $this->withdrawalRepository = $withdrawalRepository;
    }

    public function dashboard(){
        $user = Auth::user();
        
        if (!$user->isAdmin()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $stats = [
            'total_users' => count($this->userRepository->all()),
            'total_hosts' => count($this->userRepository->getUsersByRole('host')),
            'total_travelers' => count($this->userRepository->getUsersByRole('traveler')),
            'total_properties' => count($this->propertyRepository->all()),
            'pending_properties' => count($this->propertyRepository->all()->where('is_approved', false)),
            'total_reservations' => count($this->reservationRepository->all()),
            'pending_reviews' => count($this->reviewRepository->getPendingReviews()),
            'pending_withdrawals' => count($this->withdrawalRepository->getPendingWithdrawals()),
            'total_transactions' => count($this->transactionRepository->all()),
            'total_revenue' => $this->transactionRepository->all()->where('status', 'completed')->sum('amount'),
        ];

        return response()->json(['stats' => $stats]);
    }

    public function getUsers(Request $request){

        $user = Auth::user();
        
        if (!$user->isAdmin()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $role = $request->query('role');
        
        if ($role) {
            $users = $this->userRepository->getUsersByRole($role);
        } else {
            $users = $this->userRepository->all();
        }

        return response()->json(['users' => $users]);
    }

    public function toggleUserStatus($id){
        $user = Auth::user();
        
        if (!$user->isAdmin()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $targetUser = $this->userRepository->find($id);
        
        if (!$targetUser) {
            return response()->json(['message' => 'User not found'], 404);
        }

        if ($targetUser->isAdmin()) {
            return response()->json(['message' => 'Cannot deactivate admin users'], 400);
        }

        $this->userRepository->update($id, [
            'is_active' => !$targetUser->is_active
        ]);

        return response()->json([
            'message' => 'User status updated successfully',
            'user' => $this->userRepository->find($id)
        ]);
    }

    public function getPendingProperties(){
        
        $user = Auth::user();
        
        if (!$user->isAdmin()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $properties = $this->propertyRepository->all()->where('is_approved', false);
        
        foreach ($properties as $property) {
            $property->host_name = $property->host->name;
        }

        return response()->json(['properties' => $properties]);
    }
}