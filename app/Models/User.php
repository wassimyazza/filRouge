<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // 'visitor', 'traveler', 'host', 'admin'
        'phone',
        'profile_image',
        'is_active',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    public function isAdmin(){
        return $this->role === 'admin';
    }


    public function isHost(){
        return $this->role === 'host';
    }


    public function isTraveler(){
        return $this->role === 'traveler';
    }


    public function properties(){
        return $this->hasMany(Property::class, 'host_id');
    }

    public function reviews(){
        return $this->hasMany(Review::class, 'traveler_id');
    }

    public function reservations(){
        return $this->hasMany(Reservations::class, 'traveler_id');
    }

    public function sentMessages(){
        return $this->hasMany(Message::class, 'sender_id');
    }

    public function receivedMessages(){
        return $this->hasMany(Message::class, 'receiver_id');
    }

    public function withdrawals(){
        return $this->hasMany(Withdrawal::class, 'host_id');
    }
}