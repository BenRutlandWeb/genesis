<?php

namespace Genesis\Routing;

use Illuminate\Support\Collection;

class Route
{
    /**
     * The router instance.
     *
     * @var \Genesis\Routing\Router
     */
    protected $router;

    protected $attributes = [];

    /**
     * Set the router instance.
     *
     * @param \Genesis\Routing\Router $router
     * @return \Genesis\Routing\Route
     */
    public function setRouter(Router $router): Route
    {
        $this->router = $router;

        return $this;
    }

    public function setAttributes(Collection $attributes)
    {
        $this->attributes = collect($attributes);

        return $this;
    }

    /**
     * Register a route with WordPress handlers.
     *
     * @return void
     */
    public function register()
    {
        # register REST route
    }
}
