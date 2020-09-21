<?php

namespace Genesis\Routing;

use Closure;
use Genesis\Routing\RouteCollection;
use Genesis\Routing\RouteRegistrar;
use Illuminate\Support\Collection;
use Psr\Container\ContainerInterface;

class Router
{
    protected $routes;

    public $groupStack = [];

    public function __construct(ContainerInterface $app)
    {
        $this->routes = new RouteCollection();
        $this->groupStack = new Collection();

        $this->app = $app;
    }
    public function listen(string $action, $callable)
    {
        return $this->routes->add($this->createRoute($action, $callable));
    }
    public function createRoute(string $action, $callable)
    {
        return (new AjaxRoute($action, $callable))
            ->setRouter($this)
            ->setAttributes($this->groupStack);
    }

    /**
     * Create a route group with shared attributes.
     *
     * @param  Closure|string  $routes
     * @return void
     */
    public function group($attributes, $routes)
    {
        $this->groupStack->add($attributes);

        $this->loadRoutes($routes);

        $this->groupStack->pop($attributes);
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
     * Register each route to the WordPress handlers.
     *
     * @return void
     */
    public function register(): void
    {
        $this->routes->each(function ($route) {
            $route->register();
        });
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
