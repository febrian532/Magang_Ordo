
<?php
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PaymentController;

Route::prefix('admin')->group(function () {
    // USERS
    Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/users/data', [UserController::class, 'getData'])->name('admin.users.data');

    // CATEGORIES
    Route::get('/categories', [CategoryController::class, 'index'])->name('admin.categories.index');
    Route::get('/categories/data', [CategoryController::class, 'getData'])->name('admin.categories.data');

    // PRODUCTS
    Route::get('/products', [ProductController::class, 'index'])->name('admin.products.index');
    Route::get('/products/data', [ProductController::class, 'getData'])->name('admin.products.data');

    // ORDERS
    Route::get('/orders', [OrderController::class, 'index'])->name('admin.orders.index');
    Route::get('/orders/data', [OrderController::class, 'getData'])->name('admin.orders.data');

    Route::post('/payment/create', [PaymentController::class, 'createTransaction'])->name('payment.create');
});