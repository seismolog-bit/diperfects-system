<?php

use App\Http\Controllers\Admin\KategoriController;
// use App\Http\Controllers\Admin\KelurahanController;
use App\Http\Controllers\Admin\MembershipController;
use App\Http\Controllers\Admin\MembershipTypeController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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


Route::middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('index');

    //general
    Route::resource('product', ProductController::class)->parameters([
        'product'=>'product:slug'
    ]);
    Route::resource('kategori', KategoriController::class);
    Route::resource('order', OrderController::class);
    Route::get('order-membership', [OrderController::class, 'order_membership'])->name('order_membership.index');
    Route::get('order-membership/{order}', [OrderController::class, 'order_membership_show'])->name('order_membership.show');
    Route::resource('membership', MembershipController::class);
    Route::resource('member-type', MembershipTypeController::class);
    Route::resource('user', UserController::class);
});
