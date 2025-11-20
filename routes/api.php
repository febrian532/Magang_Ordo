<?php 
use App\Http\Controllers\Api\CheckoutController;
use App\Http\Controllers\Api\PaymentController;

Route::post('/checkout', [CheckoutController::class, 'checkout']);
Route::post('/payment/callback', [PaymentController::class, 'callback']);

Route::post('/payment/create', [PaymentController::class, 'createTransaction']);
