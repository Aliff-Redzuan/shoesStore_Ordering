<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\AdminController;


/*
|--------------------------------------------------------------------------
| Root
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect('/customer/shop');
});


/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {

    Route::get('/login', [AuthController::class, 'showLoginForm'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.post');

});

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');


/*
|--------------------------------------------------------------------------
| Customer Portal Entry Routes
|--------------------------------------------------------------------------
*/

Route::get('/customer', [CustomerController::class, 'index'])
    ->name('customer.index');

Route::get('/customer/dashboard', [CustomerController::class, 'index'])
    ->name('customer.dashboard');

Route::get('/customer/shop', [CustomerController::class, 'shop'])
    ->name('customer.shop');

Route::get('/customer/settings', [CustomerController::class, 'settings'])
    ->name('customer.settings');

Route::put('/customer/settings', [CustomerController::class, 'updateSettings'])
    ->name('customer.settings.update');


/*
|--------------------------------------------------------------------------
| Customer Routes
|--------------------------------------------------------------------------
*/

Route::prefix('customer')->name('customer.')->group(function () {

    // Orders
    Route::get('/orders', [CustomerController::class, 'orders'])
        ->name('orders.index');

    Route::get('/orders/{id}', [CustomerController::class, 'showOrder'])
        ->name('orders.show');

    Route::get('/orders/{id}/track', [CustomerController::class, 'trackOrder'])
        ->name('orders.track');


    // Reviews
    Route::get('/reviews', [CustomerController::class, 'reviews'])
        ->name('reviews.index');

    Route::post('/reviews', [CustomerController::class, 'storeReview'])
        ->name('reviews.store');

    Route::delete('/reviews/{id}', [CustomerController::class, 'destroyReview'])
        ->name('reviews.destroy');


    // Cart
    Route::get('/cart', [CustomerController::class, 'viewCart'])
        ->name('cart.index');

    Route::post('/cart/add', [CustomerController::class, 'addToCart'])
        ->name('cart.add');

    Route::delete('/cart/{key}', [CustomerController::class, 'removeFromCart'])
        ->name('cart.remove');


    // Checkout
    Route::get('/checkout', [CustomerController::class, 'showCheckout'])
        ->name('checkout.show');

    Route::post('/checkout', [CustomerController::class, 'processCheckout'])
        ->name('checkout.process');


    // Order confirmation
    Route::get('/order/{orderId}/confirmation', [CustomerController::class, 'orderConfirmation'])
        ->name('order.confirmation');

});


/*
|--------------------------------------------------------------------------
| Staff Portal Routes
|--------------------------------------------------------------------------
*/

Route::prefix('staff')->name('staff.')->group(function () {

    Route::get('/', [StaffController::class, 'index'])
        ->name('index');

    Route::get('/orders', [StaffController::class, 'orders'])
        ->name('orders.index');

    Route::get('/orders/{id}', [StaffController::class, 'showOrder'])
        ->name('orders.show');

    Route::put(
        '/orders/{id}/status',
        [StaffController::class, 'updateOrderStatus']
    )->name('orders.status');

    Route::get(
        '/inventory',
        [StaffController::class, 'inventory']
    )->name('inventory.index');

    Route::post(
        '/inventory',
        [StaffController::class, 'storeProduct']
    )->name('inventory.store');

    Route::put(
        '/inventory/{id}/stock',
        [StaffController::class, 'updateStock']
    )->name('inventory.update');

    Route::get(
        '/reports',
        [StaffController::class, 'reports']
    )->name('reports.index');
});


/*
|--------------------------------------------------------------------------
| Admin Portal
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->group(function () {

    // Dashboard
    Route::get('/', [AdminController::class, 'index'])
        ->name('index');

    Route::get('/dashboard', [AdminController::class, 'index'])
        ->name('dashboard');


    // Staff Management
    Route::get('/manage', [AdminController::class, 'manage'])
        ->name('manage');

    Route::post('/staff', [AdminController::class, 'staffStore'])
        ->name('staff.store');

    Route::patch('/staff/{id}/toggle', [AdminController::class, 'staffToggle'])
        ->name('staff.toggle');


    // Activity Logs
    Route::get('/logs', [AdminController::class, 'logs'])
        ->name('logs.index');


    // Reports & Analytics
    Route::get('/reports', [AdminController::class, 'reports'])
        ->name('reports.index');

});