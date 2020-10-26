<?php

use Genesis\Http\Request;
use Genesis\Support\Facades\Ajax;
use Genesis\Support\Facades\URL;

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

Ajax::prefix('gen')->group(function () {
    Ajax::listen('api', \App\Controllers\ApiController::class);

    Ajax::listen('users', function (URL $request) {
        return $request::home();
        return Genesis\Database\Models\User::find($request->id ?? 103);
    });
});
