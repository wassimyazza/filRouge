<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\TransactionController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// auth routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/forgot-password', [AuthController::class, 'forgotPassword']);

// Property routes
Route::get('/properties', [PropertyController::class, 'index']);
Route::get('/properties/{id}', [PropertyController::class, 'show']);
Route::get('/properties/{id}/reviews', [ReviewController::class, 'index']);


Route::middleware('auth:sanctum')->group(function () {
    // Auth routes
    Route::post('/logout', [AuthController::class, 'logout']);

    // User routes
    Route::get('/user', [UserController::class, 'profile']);
    Route::put('/user', [UserController::class, 'updateProfile']);
    Route::put('/user/password', [UserController::class, 'changePassword']);

    // Property routes for hosts
    Route::middleware('role:host')->group(function () {
        Route::post('/properties', [PropertyController::class, 'store']);
        Route::put('/properties/{id}', [PropertyController::class, 'update']);
        Route::delete('/properties/{id}', [PropertyController::class, 'destroy']);
        Route::get('/my-properties', [PropertyController::class, 'myProperties']);
    });


    // Reservation routes
    Route::get('/reservations', [ReservationController::class, 'index']);
    Route::get('/reservations/{id}', [ReservationController::class, 'show']);

    // Reservation routes for travelers
    Route::middleware('role:traveler')->group(function () {
        Route::post('/reservations', [ReservationController::class, 'store']);
        Route::put('/reservations/{id}/cancel', [ReservationController::class, 'cancel']);
    });

    // Reservation routes for hosts
    Route::middleware('role:host')->group(function () {
        Route::put('/reservations/{id}', [ReservationController::class, 'update']);
    });

    // Transaction routes
    Route::get('/transactions', [TransactionController::class, 'getTransactions']);

    // Transaction routes for travelers
    Route::middleware('role:traveler')->group(function () {
        Route::post('/payment/intent', [TransactionController::class, 'createPaymentIntent']);
        Route::post('/payment/confirm', [TransactionController::class, 'confirmPayment']);
    });

    // Review routes for travelers
    Route::middleware('role:traveler')->group(function () {
        Route::post('/reviews', [ReviewController::class, 'store']);
        Route::delete('/reviews/{id}', [ReviewController::class, 'destroy']);
    });    

    // Admin routes
    Route::middleware('role:admin')->group(function () {
        Route::put('/admin/reviews/{id}/approve', [ReviewController::class, 'approve']);
        Route::get('/admin/reviews/pending', [ReviewController::class, 'getPendingReviews']);
    });


    // Message routes
    Route::get('/messages/{userId}', [MessageController::class, 'getConversation']);
    Route::post('/messages', [MessageController::class, 'sendMessage']);
    Route::get('/messages/list/conversations', [MessageController::class, 'getConversationList']);

});