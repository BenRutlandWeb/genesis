<?php

namespace Genesis\Contracts;

use Genesis\Support\ServiceProvider;

interface Application extends Container
{
    /**
     * Register a service provider.
     *
     * @param \Genesis\Support\ServiceProvider $provider
     *
     * @return \Genesis\Support\ServiceProvider
     */
    public function register(ServiceProvider $provider): ServiceProvider;

    /**
     * Return an instance of the Application.
     *
     * @return \Genesis\Contracts\Application
     */
    public static function getInstance(): Application;

    /**
     * Set the shared instance of the Application.
     *
     * @return \Genesis\Contracts\Application
     */
    public static function setInstance(Application $app = null): Application;
}
