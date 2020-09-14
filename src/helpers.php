<?php

use Genesis\App;
use Genesis\Http\Request;

if (!function_exists('app')) {
    /**
     * Return an instance of the app or an app binding.
     *
     * @return \Genesis\Contracts\Container|mixed
     */
    function app($id = null, ...$params)
    {
        if (is_null($id)) {
            return App::getInstance();
        }
        return App::getInstance()->make($id, ...$params);
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

if (!function_exists('app_path')) {
    /**
     * Get the path to the app directory.
     *
     * @param string $filepath
     *
     * @return string
     */
    function app_path(string $filepath = ''): string
    {
        return app()->appPath($filepath);
    }
}

if (!function_exists('base_path')) {
    /**
     * Get the path to the theme root.
     *
     * @param string $filepath
     *
     * @return string
     */
    function base_path(string $filepath = ''): string
    {
        return app()->basePath($filepath);
    }
}

if (!function_exists('config_path')) {
    /**
     * Get the path to the theme root.
     *
     * @param string $filepath
     *
     * @return string
     */
    function config_path(string $filepath = ''): string
    {
        return app()->configPath($filepath);
    }
}

if (!function_exists('asset')) {
    /**
     * Get the asset URI
     *
     * @param string $filepath
     *
     * @return string
     */
    function asset(string $filepath = ''): string
    {
        return app('url')->asset($filepath);
    }
}

if (!function_exists('request')) {
    /**
     * Return an instance of the Request.
     *
     * @return \Genesis\Http\Request
     */
    function request(): Request
    {
        return app('request');
    }
}

if (!function_exists('csrf_field')) {
    /**
     * Return the csrf field.
     *
     * @return string
     */
    function csrf_field(): string
    {
        return wp_nonce_field('_token', '_token');
    }
}

if (!function_exists('method_field')) {
    /**
     * Return the method field.
     *
     * @return void
     */
    function method_field($method)
    {
        echo '<input type="hidden" name="_method" value="' . $method . '" />';
    }
}
