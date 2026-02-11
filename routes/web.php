<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\WishlistController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ===========================================
// RUTAS PÚBLICAS (Sin autenticación requerida)
// ===========================================

// Welcome page - shows home page with featured content
Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

// Contact page
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// Rutas de categorías (solo lectura)
Route::resource('categories', CategoryController::class)->only(['index', 'show']);

// Rutas de productos (solo lectura)
Route::get('/products-on-sale', [ProductController::class, 'onSale'])->name('products.on-sale');
Route::resource('products', ProductController::class)->only(['index', 'show']);

// Rutas de ofertas (solo lectura)
Route::resource('offers', OfferController::class)->only(['index', 'show']);

// Rutas del carrito de compras (ahora completas)
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
Route::put('/cart/{id}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
Route::post('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');

//Rutas mapa
Route::get('/stores', function () {
    $stores = [
        [
            'name' => 'Board this way! Madrid',
            'city' => 'Madrid',
            'lat' => 40.4168,
            'lng' => -3.7038,
            'address' => 'Calle Gran Vía, 123',
        ],
        [
            'name' => 'Board this way! Barcelona',
            'city' => 'Barcelona',
            'lat' => 41.3874,
            'lng' => 2.1686,
            'address' => 'Carrer de Aragó, 45',
        ],
        [
            'name' => 'Board this way! Valencia',
            'city' => 'Valencia',
            'lat' => 39.4699,
            'lng' => -0.3763,
            'address' => 'Av. del Cid, 78',
        ],
        [
            'name' => 'Board this way! Sevilla',
            'city' => 'Sevilla',
            'lat' => 37.401335, 
            'lng' => -5.974195,
            'address' => 'Ctra. de Carmona, 40',
        ],
        [
            'name' => 'Board this way! Lugo',
            'city' => 'Lugo',
            'lat' => 43.015201,
            'lng' => -7.558682,
            'address' => 'Av. da Coruña, 20',
        ],
        [
            'name' => 'Board this way! Pamplona',
            'city' => 'Pamplona',
            'lat' => 42.808582, 
            'lng' => -1.652241,
            'address' => 'Av. Sancho el Fuerte, 53',
        ],
        [
            'name' => 'Board this way! Salamanca',
            'city' => 'Salamanca',
            'lat' => 40.972158, 
            'lng' => -5.657520,
            'address' => 'C/ María Auxiliadora, 40',
        ],        
    ];

    return view('stores.index', compact('stores'));
})->name('stores.index');


// ===========================================
// RUTAS DE USUARIO AUTENTICADO (Breeze)
// ===========================================

Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Perfil de usuario
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rutas para la lista de deseos (Wishlist)
    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
    Route::post('/wishlist/{id}', [WishlistController::class, 'store'])->name('wishlist.store');
    Route::delete('/wishlist/{id}', [WishlistController::class, 'destroy'])->name('wishlist.destroy');
});


// ===========================================
// RUTAS DE ADMINISTRACIÓN (Protegidas + Logging)
// ===========================================

Route::middleware(['auth', 'admin', 'log.activity'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

    // Rutas de gestión de productos
    Route::get('/products', [ProductController::class, 'adminIndex'])->name('products.index');
    Route::resource('products', ProductController::class)->except(['index', 'show']);

    // Rutas de gestión de géneros
    Route::get('/categories', [CategoryController::class, 'adminIndex'])->name('categories.index');
    Route::resource('categories', CategoryController::class)->except(['index', 'show']);
    
});


// Las rutas de autenticación (login, register, etc.) se incluyen desde aquí
require __DIR__ . '/auth.php';
