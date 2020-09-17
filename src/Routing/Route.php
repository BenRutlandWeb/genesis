<?php

namespace Genesis\Routing;

class Route
{
    /**
     * The router instance.
     *
     * @var \Genesis\Routing\Router
     */
    protected $router;

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
}
