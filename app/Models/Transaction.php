<?php

namespace App\Models;

use App\Models\Reservations;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'reservation_id',
        'amount',
        'payment_method',
        'payment_id',
        'status', // pending, completed, failed, refunded
    ];

    public function reservation()
    {
        return $this->belongsTo(Reservations::class);
    }
}