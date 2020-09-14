<?php

namespace Genesis\Bootstrap;

use Genesis\Support\ServiceProvider;

class BootstrapServiceProvider extends ServiceProvider
{
    /**
     * The bootstrap classes for the application.
     *
     * @var array
     */
    protected $bootstrappers = [
        #\Genesis\Bootstrap\LoadEnvironmentVariables::class,
        \Genesis\Bootstrap\RegisterFacades::class,
        #\Genesis\Bootstrap\RegisterProviders::class,
        \Genesis\Bootstrap\BootProviders::class,
    ];

    public function register()
    {
        $this->app->bootstrapWith($this->bootstrappers);
    }

    public function boot()
    {
    }
}
