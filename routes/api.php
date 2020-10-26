<?php

use Genesis\Http\Request;
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


Route::prefix('auth')->group(function () {
    Route::resource('cheese', \App\Controllers\ResourceController::class);
    Route::get('api', \App\Controllers\ApiController::class);

    Route::get('users/{user?}', function (int $user = 103) {
        return Genesis\Database\Models\User::find($user);
    });
});

Route::prefix('posts/published')->group(function () {
    Route::prefix('funny')->group(function () {
        Route::get('api', \App\Controllers\ApiController::class);
    });
});
