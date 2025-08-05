<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/products', [DashboardController::class, 'products'])->name('products');
    Route::get('/orders', [DashboardController::class, 'orders'])->name('orders');
    Route::get('/customers', [DashboardController::class, 'customers'])->name('customers');
    Route::get('/analytics', [DashboardController::class, 'analytics'])->name('analytics');
});
