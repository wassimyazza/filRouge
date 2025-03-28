<?php

namespace App\Models;

use App\Models\Reservations;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_id',
        'reservation_id',
        'traveler_id',
        'rating',
        'comment',
        'is_approved',
    ];

    public function property(){
        return $this->belongsTo(Property::class);
    }

    public function traveler(){
        return $this->belongsTo(User::class, 'traveler_id');
    }

    public function reservation(){
        return $this->belongsTo(Reservations::class);
    }
}