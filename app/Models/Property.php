<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'host_id',
        'title',
        'description',
        'type', // apartment, house, villa, etc.
        'city',
        'address',
        'price_per_night',
        'capacity',
        'bedrooms',
        'bathrooms',
        'is_available',
        'is_approved',
    ];

    public function host()
    {
        return $this->belongsTo(User::class, 'host_id');
    }

    public function images()
    {
        return $this->hasMany(PropertyImage::class);
    }
}