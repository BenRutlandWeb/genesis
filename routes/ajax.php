<?php

use Genesis\Support\Facades\Ajax;

/*
|--------------------------------------------------------------------------
| AJAX Routes
|--------------------------------------------------------------------------
|
| Here is where you can register AJAX routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "ajax" middleware group. Enjoy building your API!
|
*/

Ajax::listen('ajax_action', \App\Http\Controllers\DummyController::class);

Ajax::prefix('get')->group(function () {
    Ajax::auth('the_action_auth', \App\Http\Controllers\DummyController::class);
    Ajax::guest('the_action_guest', \App\Http\Controllers\DummyController::class);
    Ajax::listen('the_action_both', \App\Http\Controllers\DummyController::class);
});

Ajax::middleware('guest')->group(function () {
    Ajax::listen('authenticated', \App\Http\Controllers\DummyController::class);
});
