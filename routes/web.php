<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home/home');
});



Route::get('/search', function () {
    return view('visiteur.search');
});

Route::get('/hotel-detail', function () {
    return view('visiteur.hotel-detail');
});

Route::get('/booking', function () {
    return view('visiteur.booking');
});

Route::get('/user/dashboard', function () {
    return view('client.dashboard');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});