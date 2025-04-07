<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'hotel_id',
        'name',
        'description',
        'capacity',
        'price_per_night',
        'quantity',
        'is_available',
    ];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    public function images()
    {
        return $this->hasMany(RoomImage::class);
    }

    public function amenities()
    {
        return $this->belongsToMany(Amenity::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function getPrimaryImageAttribute()
    {
        return $this->images()->where('is_primary', true)->first() ?? 
               $this->images()->first();
    }

    public function isAvailableForDates($checkIn, $checkOut)
    {
        // Count bookings that overlap with the requested dates
        $overlappingBookings = $this->bookings()
            ->where('status', '!=', 'cancelled')
            ->where(function ($query) use ($checkIn, $checkOut) {
                $query->where(function ($q) use ($checkIn, $checkOut) {
                    $q->where('check_in_date', '>=', $checkIn)
                      ->where('check_in_date', '<', $checkOut);
                })->orWhere(function ($q) use ($checkIn, $checkOut) {
                    $q->where('check_out_date', '>', $checkIn)
                      ->where('check_out_date', '<=', $checkOut);
                })->orWhere(function ($q) use ($checkIn, $checkOut) {
                    $q->where('check_in_date', '<=', $checkIn)
                      ->where('check_out_date', '>=', $checkOut);
                });
            })
            ->count();

        // Room is available if number of overlapping bookings is less than quantity
        return $overlappingBookings < $this->quantity;
    }
}