<?php

use Genesis\Application;
use Genesis\Http\Request;
use Illuminate\Support\Carbon;

if (!function_exists('app')) {
    /**
     * Return an instance of the app or an app binding.
     *
     * @return \Genesis\Contracts\Container|mixed
     */
    function app($id = null, ...$params)
    {
        if (is_null($id)) {
            return Application::getInstance();
        }
        return Application::getInstance()->make($id, ...$params);
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

if (!function_exists('resource_path')) {
    /**
     * Get a resource path.
     *
     * @param string $filepath
     * @return string
     */
    function resource_path(string $filepath): string
    {
        return app()->resourcesPath($filepath);
    }
}

if (!function_exists('config')) {
    /**
     * Get the config or a value from the config if a key is passed.
     *
     * @param string $key
     *
     * @return mixed
     */
    function config(string $key = '')
    {
        if ($key) {
            return app('config')->get($key);
        }
        return app('config');
    }
}

if (!function_exists('auth')) {
    /**
     * Get the config or a value from the config if a key is passed.
     *
     * @param string $key
     *
     * @return mixed
     */
    function auth()
    {
        return app('auth');
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

if (!function_exists('view')) {
    /**
     * Return a view.
     *
     * @param string  $filepath
     * @param array   $args
     *
     * @return string
     */
    function view(string $filepath, array $args = []): string
    {
        extract($args);
        ob_start();
        include base_path("views/$filepath.php");
        return ob_get_clean();
    }
}

if (!function_exists('now')) {
    /**
     * Create a new Carbon instance for the current time.
     *
     * @param  \DateTimeZone|string|null  $tz
     *
     * @return \Illuminate\Support\Carbon
     */
    function now($tz = null)
    {
        return Carbon::now($tz);
    }
}

if (!function_exists('today')) {
    /**
     * Create a new Carbon instance for the current date.
     *
     * @param  \DateTimeZone|string|null  $tz
     *
     * @return \Illuminate\Support\Carbon
     */
    function today($tz = null)
    {
        return Carbon::today($tz);
    }
}
