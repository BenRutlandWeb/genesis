<?php

namespace App\Providers;

use Genesis\Support\ServiceProvider;

class AdminServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->instance('wp.blockmenu', new \App\Services\ReusableBlockMenu());
    }
}
