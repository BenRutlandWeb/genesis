<?php

namespace Genesis\Routing;

use Illuminate\Support\Arr;

class RouteRegistrar
{
    /**
     * The attributes to pass on to the router.
     *
     * @var array
     */
    protected $attributes = [];

    /**
     * The attributes that can be set through this class.
     *
     * @var array
     */
    protected $allowedAttributes = [
        'middleware',
        'prefix',
    ];

    /**
     * Create a new route registrar instance.
     *
     * @param \Genesis\Routing\Router $router
     *
     * @return void
     */
    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    /**
     * Set the value for a given attribute.
     *
     * @param string       $key
     * @param string|array $value
     *
     * @return self
     */
    public function attribute(string $key, $value): self
    {
        $this->attributes[$key] = $value;

        return $this;
    }

    /**
     * Create a route group with shared attributes.
     *
     * @param  Closure|string  $callback
     * @return void
     */
    public function group($routes): void
    {
        $this->router->group($this->attributes, $routes);
    }

    /**
     * Dynamically handle calls into the route registrar.
     *
     * @param string $method
     * @param array  $parameters
     *
     * @return self
     */
    public function __call(string $method, array $parameters): self
    {
        if (in_array($method, $this->allowedAttributes)) {
            return $this->attribute($method, Arr::wrap($parameters));
        }
    }
}
