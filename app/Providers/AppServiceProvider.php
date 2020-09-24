<?php

namespace App\Providers;

use Genesis\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->instance('assets', new \App\Services\Assets());
    }
}
