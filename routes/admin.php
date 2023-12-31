<?php

use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\GaleryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\MembershipController;
use App\Http\Controllers\Admin\MembershipTypeController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\OrderItemController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('index');

    //general
    Route::resource('product', ProductController::class)->parameters([
        'product'=>'product:slug'
    ]);
    Route::resource('kategori', KategoriController::class);
    Route::resource('order', OrderController::class);
    Route::post('order/confirm', [OrderController::class, 'confirm'])->name('order.confirm');
    Route::post('order/{order}/finish', [OrderController::class, 'finish'])->name('order.finish');
    Route::get('order/{order}/invoice', [OrderController::class, 'invoice'])->name('order.invoice');
    Route::get('order/{order}/status', [OrderController::class, 'status'])->name('order.status');
    // Route::post('order/{order}/payment', [OrderController::class, 'payment'])->name('order.payment');
    Route::resource('order-item', OrderItemController::class);
    Route::resource('payment', PaymentController::class);

    Route::get('order-membership', [OrderController::class, 'order_membership'])->name('order_membership.index');
    Route::get('order-membership/{order}', [OrderController::class, 'order_membership_show'])->name('order_membership.show');
    Route::resource('membership', MembershipController::class);
    Route::resource('member-type', MembershipTypeController::class);
    Route::resource('user', UserController::class);

    Route::resource('feature', FeatureController::class);
    Route::resource('galeries', GaleryController::class);

    Route::get('reports', [ReportController::class, 'index'])->name('report.index');
    Route::get('reports/finance', [ReportController::class, 'finance'])->name('report.finance');
    Route::get('reports/products', [ReportController::class, 'reportProducts'])->name('report.reportProducts');

    Route::get('reports/products/{id}', [ReportController::class, 'reportProduct'])->name('report.reportProduct');
});
