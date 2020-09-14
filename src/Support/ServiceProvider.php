<?php

namespace Genesis\Support;

use Genesis\Contracts\Container;

abstract class ServiceProvider
{
    protected $app;

    public function __construct(Container $app)
    {
        $this->app = $app;
    }

    public function register()
    {
        # code...
    }

    public function boot()
    {
        # code...
    }
}
