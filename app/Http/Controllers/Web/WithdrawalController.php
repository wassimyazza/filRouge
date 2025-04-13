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

    public function adminIndex(){
        $user = Auth::user();
        
        if (!$user->isAdmin()) {
            return redirect()->route('home')
                ->with('error', 'Unauthorized access');
        }

        $withdrawals = $this->withdrawalRepository->all();
        
        foreach ($withdrawals as $withdrawal) {
            $withdrawal->host_name = $withdrawal->host->name;
        }
        
        return view('admin.withdrawals', compact('withdrawals'));
    }

    public function create(){
        $user = Auth::user();
        
        if (!$user->isHost()) {
            return redirect()->route('home')
                ->with('error', 'Only hosts can request withdrawals');
        }
        
        $availableBalance = $this->calculateAvailableBalance($user->id);
        
        return view('withdrawals.create', compact('availableBalance'));
    }

    public function store(Request $request){
        $user = Auth::user();
        
        if (!$user->isHost()) {
            return redirect()->route('home')
                ->with('error', 'Only hosts can request withdrawals');
        }

        $validator = Validator::make($request->all(), [
            'amount' => 'required|numeric|min:100',
            'bank_info' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $availableBalance = $this->calculateAvailableBalance($user->id);

        if ($request->amount > $availableBalance) {
            return redirect()->back()
                ->withErrors(['amount' => 'Insufficient balance'])
                ->withInput();
        }

        $this->withdrawalRepository->create([
            'host_id' => $user->id,
            'amount' => $request->amount,
            'status' => 'pending',
            'bank_info' => $request->bank_info,
        ]);

        return redirect()->route('withdrawals.index')
            ->with('success', 'Withdrawal request submitted successfully');
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
        
        $approvedWithdrawals = $this->withdrawalRepository->getWithdrawalsByHost($hostId)
            ->where('status', 'approved')
            ->sum('amount');
        
        return $totalEarnings - $approvedWithdrawals;
    }


    public function approve($id){
        $user = Auth::user();
        
        if (!$user->isAdmin()) {
            return redirect()->route('home')
                ->with('error', 'Only admins can approve withdrawals');
        }

        $withdrawal = $this->withdrawalRepository->find($id);
        
        if (!$withdrawal) {
            return redirect()->route('admin.withdrawals')
                ->with('error', 'Withdrawal not found');
        }

        if ($withdrawal->status !== 'pending') {
            return redirect()->route('admin.withdrawals')
                ->with('error', 'Only pending withdrawals can be approved');
        }

        $this->withdrawalRepository->update($id, [
            'status' => 'approved'
        ]);

        return redirect()->route('admin.withdrawals')
            ->with('success', 'Withdrawal approved successfully');
    }

    public function reject($id)
    {
        $user = Auth::user();
        
        if (!$user->isAdmin()) {
            return redirect()->route('home')
                ->with('error', 'Only admins can reject withdrawals');
        }

        $withdrawal = $this->withdrawalRepository->find($id);
        
        if (!$withdrawal) {
            return redirect()->route('admin.withdrawals')
                ->with('error', 'Withdrawal not found');
        }

        if ($withdrawal->status !== 'pending') {
            return redirect()->route('admin.withdrawals')
                ->with('error', 'Only pending withdrawals can be rejected');
        }

        $this->withdrawalRepository->update($id, [
            'status' => 'rejected'
        ]);

        return redirect()->route('admin.withdrawals')
            ->with('success', 'Withdrawal rejected successfully');
    }

    
}
