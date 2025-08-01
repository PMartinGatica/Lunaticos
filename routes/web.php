<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Página principal - Inicio
Route::get('/', [HomeController::class, 'index'])->name('home');

// Tienda
Route::get('/tienda', [ShopController::class, 'index'])->name('shop');
Route::get('/tienda/{product:slug}', [ProductController::class, 'show'])->name('product.show');

// Páginas institucionales
Route::get('/nosotros', [PageController::class, 'about'])->name('about');
Route::get('/faq', [PageController::class, 'faq'])->name('faq');
Route::get('/contacto', [PageController::class, 'contact'])->name('contact');
Route::get('/legal', [PageController::class, 'legal'])->name('legal');

// Carrito y Checkout
Route::prefix('carrito')->name('cart.')->group(function () {
    Route::get('/', [ShopController::class, 'cart'])->name('index');
    Route::post('/add/{product}', [ShopController::class, 'addToCart'])->name('add');
    Route::patch('/update/{id}', [ShopController::class, 'updateCart'])->name('update');
    Route::delete('/remove/{id}', [ShopController::class, 'removeFromCart'])->name('remove');
    Route::get('/checkout', [ShopController::class, 'checkout'])->name('checkout');
    Route::post('/process', [ShopController::class, 'processCheckout'])->name('process');
});

// WhatsApp integration
Route::get('/whatsapp/{product?}', [PageController::class, 'whatsapp'])->name('whatsapp');
