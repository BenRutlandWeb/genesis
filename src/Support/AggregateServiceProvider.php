<?php

namespace Genesis\Support;

use Genesis\Support\ServiceProvider;

class AggregateServiceProvider extends ServiceProvider
{
    /**
     * The provider class names.
     *
     * @var array
     */
    protected $providers = [];

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register(): void
    {
        foreach ($this->providers as $provider) {
            $this->app->register($provider);
        }
    }
}
