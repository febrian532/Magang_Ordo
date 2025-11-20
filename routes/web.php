<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\AuthController;

Route::prefix('admin')->name('admin.')->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Users
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/data', [UserController::class, 'getData'])->name('users.data');
    Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');

    // Categories
    Route::get('/categories/data', [CategoryController::class, 'getData'])->name('categories.data');
    Route::resource('categories', CategoryController::class);

    // Products
    Route::get('/products/data', [ProductController::class, 'getData'])->name('products.data');
    Route::resource('products', ProductController::class);

    // Orders
    Route::get('/orders/data', [OrderController::class, 'getData'])->name('orders.data');
    Route::resource('orders', OrderController::class);

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
