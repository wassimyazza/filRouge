<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdrawal extends Model
{
    use HasFactory;

    protected $fillable = [
        'host_id',
        'amount',
        'status', // pending, approved, rejected
        'bank_info',
    ];

    public function host(){
        return $this->belongsTo(User::class, 'host_id');
    }
}