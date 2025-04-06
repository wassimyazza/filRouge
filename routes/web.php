<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home/home');
});



// Visiteur routers

Route::get('/search', function () {
    return view('visiteur.search');
});

Route::get('/hotel-detail', function () {
    return view('visiteur.hotel-detail');
});

Route::get('/booking', function () {
    return view('visiteur.booking');
});

Route::get('/booking-confirmation', function () {
    return view('visiteur.booking-confirmation');
});


// Client routers

Route::get('/dashboard', function () {
    return view('client.dashboard');
});

Route::get('/profile', function () {
    return view('client.profile');
});


// Authentification routers
Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});