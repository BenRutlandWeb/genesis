<?php

namespace Genesis\Auth;

use Genesis\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton('auth', function ($app) {
            return $app->call(\Genesis\Auth\Auth::class, $app);
        });
    }
}
