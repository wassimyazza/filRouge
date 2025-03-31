<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\WithdrawalRepository;

class WithdrawalController extends Controller
{
    
    protected $withdrawalRepository;

    public function __construct(WithdrawalRepository $withdrawalRepository) {
        $this->withdrawalRepository = $withdrawalRepository;
    }


    public function index(){
        $user = Auth::user();
        
        if ($user->isAdmin()) {
            $withdrawals = $this->withdrawalRepository->all();
        } elseif ($user->isHost()) {
            $withdrawals = $this->withdrawalRepository->getWithdrawalsByHost($user->id);
        } else {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        return response()->json(['withdrawals' => $withdrawals]);
    }

}
