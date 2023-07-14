<?php

use App\Http\Controllers\Admin\KelurahanController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// kelurahan search

Route::get('kabupaten-search', [KelurahanController::class, 'kabupaten_search'])->name('kabupaten-search');
Route::get('kecamatan-search', [KelurahanController::class, 'kecamatan_search'])->name('kecamatan-search');
Route::get('kelurahan-search', [KelurahanController::class, 'kelurahan_search'])->name('kelurahan-search');
