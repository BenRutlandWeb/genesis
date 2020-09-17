<?php

namespace Genesis\Routing;

use Genesis\Routing\Route;
use Illuminate\Support\Collection;

class RouteCollection extends Collection
{
    /**
     * Return the route after adding it the the collection.
     *
     * @param \Genesis\Routing\Route $route
     *
     * @return \Genesis\Routing\Route
     */
    public function add($route): Route
    {
        parent::add($route);

        return $route;
    }
}
