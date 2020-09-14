<?php

use Genesis\App;
use Genesis\Contracts\Container;

if (!function_exists('app')) {
    /**
     * Return an instance of the app.
     *
     * @return \Genesis\Contracts\Container
     */
    function app(): Container
    {
        return App::getInstance();
    }
}

if (!function_exists('dd')) {
    /**
     * Die and dump.
     *
     * @param mixed ...$args
     *
     * @return void
     */
    function dd(...$args): void
    {
        die(var_dump(...$args));
    }
}

if (!function_exists('dump')) {
    /**
     * Dump.
     *
     * @param mixed ...$args
     *
     * @return void
     */
    function dump(...$args): void
    {
        var_dump(...$args);
    }
}
