<?php

use Genesis\Http\Request;
use Genesis\Support\Facades\Ajax;

/*
|--------------------------------------------------------------------------
| AJAX Routes
|--------------------------------------------------------------------------
|
| Here is where you can register AJAX routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Ajax::middleware(['auth', 'guest'])->group(function () {
    Ajax::listen('test', \App\Controllers\TestController::class);
});
