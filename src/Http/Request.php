<?php

namespace Genesis\Http;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use JsonSerializable;

class Request implements JsonSerializable
{
    /**
     * The app instance.
     *
     * @var \Genesis\Http\Request
     */
    private static $instance = null;

    /**
     * The request collection.
     *
     * @var \Illuminate\Support\Collection
     */
    public $request = [];

    /**
     * Assign the request array.
     */
    public function __construct()
    {
        $this->request = collect($_REQUEST);
        $this->server = collect($_SERVER);
    }

    /**
     * Return the instance of the app.
     *
     * @return \Genesis\Http\Request
     */
    public static function getInstance(): Request
    {
        if (!self::$instance) {
            self::$instance = new static;
        }
        return self::$instance;
    }

    /**
     * Call the underlying Collection API on the request object.
     *
     * @param string $name
     * @param array  $args
     *
     * @return mixed
     */
    public function __call(string $name, array $args)
    {
        return $this->request->$name(...$args);
    }

    /**
     * Get the intended method.
     *
     * @return string
     */
    public function getMethod(): string
    {
        $real_method = Str::upper($this->method());

        if ($real_method === 'GET') {
            return $real_method;
        }
        return $this->get('_method') ?: $real_method;
    }

    /**
     * Get th request method.
     *
     * @return string
     */
    public function method(): string
    {
        return $this->server->get('REQUEST_METHOD');
    }

    /**
     * Get a header by it's key.
     *
     * @param string $key
     *
     * @return string
     */
    public function header(string $key): string
    {
        return $this->server->get($key) ?? '';
    }

    /**
     * Only serialize the request object.
     *
     * @return \Illuminate\Support\Collection
     */
    public function jsonSerialize(): Collection
    {
        return $this->request;
    }
}
