<?php

namespace Genesis\Routing;

use Closure;
use Genesis\Routing\Route;
use Genesis\Routing\RouteCollection;
use Genesis\Routing\RouteRegistrar;
use Psr\Container\ContainerInterface;

class Router
{
    protected $routes;

    protected $groupStack = [];

    public function __construct(ContainerInterface $app)
    {
        $this->routes = new RouteCollection();

        $this->app = $app;
    }

    public function listen(string $action, $callable)
    {
        return $this->routes->add($this->createRoute($action, $callable));
    }


    public function createRoute(string $action, $callable)
    {
        return (new AjaxRoute($action, $callable))->setRouter($this);
    }

    public function run()
    {
        dump($this->routes);
        $this->routes->each(function ($route) {
            return $route->run();
        });
    }

    /**
     * Create a route group with shared attributes.
     *
     * @param  \Closure|string  $routes
     * @return void
     */
    public function group($attributes, $routes)
    {
        $this->groupStack[] = $attributes;
        #$this->updateGroupStack($attributes);

        // Once we have updated the group stack, we'll load the provided routes and
        // merge in the group's attributes when the routes are created. After we
        // have created the routes, we will pop the attributes off the stack.
        $this->loadRoutes($routes);

        array_pop($this->groupStack);
    }

    /**
     * Load the provided routes.
     *
     * @param  Closure|string  $routes
     *
     * @return void
     */
    protected function loadRoutes($routes)
    {
        if ($routes instanceof Closure) {
            $routes($this);
        } else {
            require $routes;
        }
    }

    /**
     * Dynamically handle calls into the router instance.
     *
     * @param  string  $method
     * @param  array  $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        return (new RouteRegistrar($this))->attribute($method, $parameters[0]);
    }
}
