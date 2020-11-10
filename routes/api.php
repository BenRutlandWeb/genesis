<?php

use Genesis\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

#Route::get('example/{name}', \App\Http\Controllers\DummyController::class);
Route::get('coupons/{coupon}', [\App\Http\Controllers\CouponController::class, 'show']);

#Route::resource('coupons', \App\Http\Controllers\CouponController::class);
#Route::get('coupons/{id}/redeem', [\App\Http\Controllers\CouponController::class, 'redeem']);
