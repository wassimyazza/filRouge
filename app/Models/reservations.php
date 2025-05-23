<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservations extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_id',
        'traveler_id',
        'check_in_date',
        'check_out_date',
        'guests_count',
        'total_price',
        'status',
    ];

    protected $casts = [
        'check_in_date' => 'date',
        'check_out_date' => 'date',
    ];

    public function property(){
        return $this->belongsTo(Property::class);
    }

    public function traveler(){
        return $this->belongsTo(User::class, 'traveler_id');
    }

    public function transaction(){
        return $this->hasOne(Transaction::class, 'reservation_id');
    }

    public function review(){
        return $this->hasOne(Review::class, 'reservation_id');
    }
}