<?php

use App\Http\Controllers\Admin\KelurahanController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Public\AboutController;
use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('index');

//product
Route::get('products', [ProductController::class, 'index'])->name('product.index');
Route::get('products/{product:slug}', [ProductController::class, 'show'])->name('product.show');

//about
Route::get('contact', [AboutController::class, 'contact'])->name('contact');
Route::get('about', [AboutController::class, 'about'])->name('about');
Route::get('privacy', [AboutController::class, 'privacy'])->name('privacy');
Route::get('term-condition', [AboutController::class, 'term'])->name('term');

Route::get('news', [AboutController::class, 'news'])->name('news');

Auth::routes(['register' => false]);

// wilayah
Route::get('kabupaten-search', [KelurahanController::class, 'kabupaten_search'])->name('kabupaten-search');
Route::get('kecamatan-search', [KelurahanController::class, 'kecamatan_search'])->name('kecamatan-search');
Route::get('kelurahan-search', [KelurahanController::class, 'kelurahan_search'])->name('kelurahan-search');

//cart
Route::resource('carts', CartController::class);
Route::post('cart-clear', [CartController::class, 'clear'])->name('cart.clear');
