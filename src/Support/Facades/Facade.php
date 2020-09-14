<?php

namespace Genesis\Support\Facades;

use Genesis\Contracts\Container;

abstract class Facade
{
    /**
     * The container.
     *
     * @var \Genesis\Bootstrap\Container\Container
     */
    public static $app;

    /**
     * Route static calls to the correct container binding.
     *
     * @param string $method The method to call on the facade.
     * @param array  $params Parameters to pass to the method call.
     *
     * @return mixed
     */
    public static function __callStatic(string $method, array $params)
    {
        return static::$app->get(static::getFacadeAccessor())->$method(...$params);
    }

    /**
     * Assign the container to the facade.
     *
     * @param \Genesis\Bootstrap\Container\Container $app The container.
     *
     * @return void
     */
    public static function setFacadeApplication(Container $app): void
    {
        static::$app = $app;
    }
}
