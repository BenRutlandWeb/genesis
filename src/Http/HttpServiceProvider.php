<?php

namespace Genesis\Http;

use Genesis\Support\ServiceProvider;

class HttpServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton('request', function ($app) {
            return $app->call(\Genesis\Http\Request::class, $app);
        });
    }
}
