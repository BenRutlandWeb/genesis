<?php

namespace Genesis\Support;

use Genesis\Contracts\Application;

abstract class ServiceProvider
{
    /**
     * The Application instance.
     *
     * @var \Genesis\Contracts\Application
     */
    protected $app;

    /**
     * Create a new service provider instance.
     *
     * @param \Genesis\Contracts\Application $app
     *
     * @return void
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public abstract function register(): void;
}
