<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\UserController;
use App\Http\Controllers\Web\MessageController;
use App\Http\Controllers\Web\PropertyController;
use App\Http\Controllers\Web\WithdrawalController;
use App\Http\Controllers\Web\ReservationController;
use App\Http\Controllers\Web\TransactionController;

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
    Route::get('/profile/edit', [UserController::class, 'editProfile'])->name('profile.edit');
    Route::get('/profile/password', [UserController::class, 'showChangePasswordForm'])->name('password.change');
    Route::put('/profile', [UserController::class, 'updateProfile'])->name('profile.update');
    Route::put('/profile/password', [UserController::class, 'changePassword'])->name('password.update');
    
    // Reservations
    Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations.index');
    Route::get('/reservations/{id}', [ReservationController::class, 'show'])->name('reservations.show');
    Route::get('/messages/{userId}', [MessageController::class, 'getConversation'])->name('messages.conversation');
    
    // Messages
    Route::get('/messages', [MessageController::class, 'getConversationList'])->name('messages.index');
    Route::get('/messages/{userId}', [MessageController::class, 'getConversation'])->name('messages.conversation');
    Route::post('/messages', [MessageController::class, 'sendMessage'])->name('messages.send');
    
    // Transactions
    Route::get('/transactions', [TransactionController::class, 'getTransactions'])->name('transactions.index');

    Route::middleware(['role:traveler'])->group(function () {
        // Reservations
        Route::get('/properties/{id}/reserve', [ReservationController::class, 'create'])->name('reservations.create');
        Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');
        Route::post('/reservations/{id}/cancel', [ReservationController::class, 'cancel'])->name('reservations.cancel');

        // Payments
        Route::get('/payment/checkout/{reservationId}', [TransactionController::class, 'showCheckoutPage'])->name('payment.checkout');
        Route::post('/payment/intent', [TransactionController::class, 'createPaymentIntent'])->name('payment.intent');
        Route::post('/payment/confirm', [TransactionController::class, 'confirmPayment'])->name('payment.confirm');

        // Reviews
        Route::get('/reservations/{id}/review', [ReviewController::class, 'create'])->name('reviews.create');
        Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
        Route::delete('/reviews/{id}', [ReviewController::class, 'destroy'])->name('reviews.destroy');

        Route::post('/create-checkout-session', [TransactionController::class, 'createCheckoutSession'])->name('transactions.createCheckoutSession');

        
    });

    // Host routes
    Route::middleware(['role:host'])->group(function () {
        // Properties
        Route::get('/host/properties', [PropertyController::class, 'myProperties'])->name('host.properties');
        Route::get('/properties/create', [PropertyController::class, 'create'])->name('properties.create');


        // Reservations
        Route::get('/host/reservations', [ReservationController::class, 'hostReservations'])->name('host.reservations');

        // Withdrawals
        Route::get('/withdrawals', [WithdrawalController::class, 'index'])->name('withdrawals.index');

    });    

});