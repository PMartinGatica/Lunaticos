<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ImportController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Rutas de productos
    Route::resource('products', ProductController::class);
    Route::patch('/products/{product}/toggle-status', [ProductController::class, 'toggleStatus'])->name('products.toggle-status');
    Route::post('/products/bulk-action', [ProductController::class, 'bulkAction'])->name('products.bulk-action');
    
    // Rutas de importación
    Route::get('/import', [ImportController::class, 'index'])->name('import.index');
    Route::post('/import/products', [ImportController::class, 'importProducts'])->name('import.products');
    
    // Rutas pendientes (temporalmente redirigen al dashboard)
    Route::get('/orders', [DashboardController::class, 'orders'])->name('orders');
    Route::get('/customers', [DashboardController::class, 'customers'])->name('customers');
    Route::get('/analytics', [DashboardController::class, 'analytics'])->name('analytics');
});
