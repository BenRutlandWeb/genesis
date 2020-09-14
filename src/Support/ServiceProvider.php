<?php

namespace Genesis\Support;

use Psr\Container\ContainerInterface;

abstract class ServiceProvider
{
    protected $app;

    public function __construct(ContainerInterface $app)
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
