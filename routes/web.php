<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\Web\PropertyController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

// Public property routes
Route::get('/properties', [PropertyController::class, 'index'])->name('properties.index');
Route::get('/properties/{id}', [PropertyController::class, 'show'])->name('properties.show');

// Guest routes
Route::middleware(['guest'])->group(function () {
    // Authentication
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
    Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');
    Route::post('/forgot-password', [AuthController::class, 'forgotPassword'])->name('password.email');
});


// Authenticated routes
Route::middleware(['auth'])->group(function () {
    // Auth
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    // User profile
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    
    // Reservations
    Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations.index');
    
    // Messages
    Route::get('/messages', [MessageController::class, 'getConversationList'])->name('messages.index');
    
    // Transactions
    Route::get('/transactions', [TransactionController::class, 'getTransactions'])->name('transactions.index');
    

});