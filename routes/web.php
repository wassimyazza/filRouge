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


// Owner routers

Route::get('/owner/dashboard', function(){
    return view('owner.owner-dashboard');
});

Route::get('/owner/listings', function(){
    return view('owner.owner-listings');
});

Route::get('/owner/add-listing', function(){
    return view('owner.owner-add-listing');
});

Route::get('/owner/reservations', function(){
    return view('owner.owner-reservations');
});

Route::get('/owner/reviews', function(){
    return view('owner.owner-reviews');
});

Route::get('/owner/earnings', function(){
    return view('owner.owner-earnings');
});

Route::get('/owner/analytics', function(){
    return view('owner.owner-analytics');
});

Route::get('/owner/messages', function(){
    return view('owner.owner-messages');
});

Route::get('/owner/profile', function(){
    return view('owner.owner-profile');
});

Route::get('/owner/settings', function(){
    return view('owner.owner-settings');
});