<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Repositories\WithdrawalRepository;
use App\Repositories\ReservationRepository;
use App\Repositories\TransactionRepository;

class WithdrawalController extends Controller{
    
    protected $withdrawalRepository;
    protected $reservationRepository;
    protected $transactionRepository;

    public function __construct(WithdrawalRepository $withdrawalRepository,ReservationRepository $reservationRepository,TransactionRepository $transactionRepository) {
        $this->withdrawalRepository = $withdrawalRepository;
        $this->reservationRepository = $reservationRepository;
        $this->transactionRepository = $transactionRepository;
    }


    public function index(){
        $user = Auth::user();
        
        if (!$user->isHost()) {
            return redirect()->route('home')
                ->with('error', 'Only hosts can access withdrawals');
        }

        $withdrawals = $this->withdrawalRepository->getWithdrawalsByHost($user->id);
        $availableBalance = $this->calculateAvailableBalance($user->id);
        
        return view('withdrawals.index', compact('withdrawals', 'availableBalance'));
    }

    public function store(Request $request){
        $user = Auth::user();
        
        if (!$user->isHost()) {
            return response()->json(['message' => 'Only hosts can request withdrawals'], 403);
        }

        $validator = Validator::make($request->all(), [
            'amount' => 'required|numeric|min:100',
            'amount' => 'required|numeric|min:100',
            'bank_info' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $availableBalance = $this->calculateAvailableBalance($user->id);

        if ($request->amount > $availableBalance) {
            return response()->json([
                'message' => 'Insufficient balance',
                'available_balance' => $availableBalance
            ], 400);
        }

        $withdrawal = $this->withdrawalRepository->create([
            'host_id' => $user->id,
            'amount' => $request->amount,
            'status' => 'pending',
            'bank_info' => $request->bank_info,
        ]);

        return response()->json([
            'message' => 'Withdrawal request submitted successfully',
            'withdrawal' => $withdrawal
        ], 201);
    }

    private function calculateAvailableBalance($hostId){

        $reservations = $this->reservationRepository->getReservationsByHost($hostId)->where('status', 'completed');
        
        $totalEarnings = 0;
        
        foreach ($reservations as $reservation) {
            $transaction = $this->transactionRepository->getTransactionsByReservation($reservation->id);
            if ($transaction && $transaction->status === 'completed') {
                $totalEarnings += $transaction->amount;
            }
        }
        
        $approvedWithdrawals = $this->withdrawalRepository->getWithdrawalsByHost($hostId)->where('status', 'approved')->sum('amount');
        
        return $totalEarnings - $approvedWithdrawals;
    }


    public function approve($id){
        $user = Auth::user();
        
        if (!$user->isAdmin()) {
            return response()->json(['message' => 'Only admins can approve withdrawals'], 403);
        }

        $withdrawal = $this->withdrawalRepository->find($id);
        
        if (!$withdrawal) {
            return response()->json(['message' => 'Withdrawal not found'], 404);
        }

        if ($withdrawal->status !== 'pending') {
            return response()->json(['message' => 'Only pending withdrawals can be approved'], 400);
        }

        $this->withdrawalRepository->update($id, [
            'status' => 'approved'
        ]);

        return response()->json([
            'message' => 'Withdrawal approved successfully',
            'withdrawal' => $this->withdrawalRepository->find($id)
        ]);
    }

    public function reject($id){
        $user = Auth::user();
        
        if (!$user->isAdmin()) {
            return response()->json(['message' => 'Only admins can reject withdrawals'], 403);
        }

        $withdrawal = $this->withdrawalRepository->find($id);
        
        if (!$withdrawal) {
            return response()->json(['message' => 'Withdrawal not found'], 404);
        }

        if ($withdrawal->status !== 'pending') {
            return response()->json(['message' => 'Only pending withdrawals can be rejected'], 400);
        }

        $this->withdrawalRepository->update($id, [
            'status' => 'rejected'
        ]);

        return response()->json([
            'message' => 'Withdrawal rejected successfully',
            'withdrawal' => $this->withdrawalRepository->find($id)
        ]);
    }
}
