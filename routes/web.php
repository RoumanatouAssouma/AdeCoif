<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminBlogController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminGalleryController;
use App\Http\Controllers\Admin\AdminReservationController;
use App\Http\Controllers\Admin\AdminServiceController;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Routes publiques
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/services', [ServiceController::class, 'index'])->name('services');
Route::get('/services/{service}', [ServiceController::class, 'show'])->name('services.show');

Route::get('/galerie', [GalleryController::class, 'index'])->name('gallery');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/reservation', [ReservationController::class, 'index'])->name('reservation');
Route::post('/reservation', [ReservationController::class, 'store'])->name('reservation.store');

Route::get('/boutique', [ShopController::class, 'index'])->name('shop');
Route::get('/boutique/produit/{product}', [ProductController::class, 'show'])->name('product.show');
Route::get('/boutique/categorie/{category}', [ShopController::class, 'category'])->name('shop.category');

Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog/{post}', [BlogController::class, 'show'])->name('blog.show');
Route::get('/blog/categorie/{category}', [BlogController::class, 'category'])->name('blog.category');

// Routes d'authentification (Laravel Breeze)
Auth::routes();

// Routes d'administration (protégées par middleware auth et admin)
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::resource('services', AdminServiceController::class, ['as' => 'admin']);
    Route::resource('gallery', AdminGalleryController::class, ['as' => 'admin']);
    Route::resource('reservations', AdminReservationController::class, ['as' => 'admin']);
    Route::resource('products', AdminProductController::class, ['as' => 'admin']);
    Route::resource('blog', AdminBlogController::class, ['as' => 'admin']);
});
