<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CheckoutController;
use App\Http\Controllers\Api\PaymentController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\UserController;

/*
|--------------------------------------------------------------------------
| PUBLIC API ROUTES
|--------------------------------------------------------------------------
*/

// Checkout (User)
Route::post('/checkout', [CheckoutController::class, 'checkout'])
    ->name('checkout');

// Payment Gateway
Route::prefix('payment')->group(function () {
    Route::post('/create', [PaymentController::class, 'createTransaction'])
        ->name('payment.create');

    Route::post('/callback', [PaymentController::class, 'callback'])
        ->name('payment.callback');
});

// Admin Auth (API)
Route::prefix('admin')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
});


/*
|--------------------------------------------------------------------------
| PROTECTED API ROUTES (SANCTUM)
|--------------------------------------------------------------------------
*/

Route::prefix('admin')
    ->middleware('auth:sanctum')
    ->group(function () {

        // Logout
        Route::post('/logout', [AuthController::class, 'logout']);

        // Update Profile Admin (API)
        Route::put('/profile', [UserController::class, 'update']);
    });
