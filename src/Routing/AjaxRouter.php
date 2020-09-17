<?php

namespace Genesis\Routing;

class AjaxRouter extends Router
{
    public function listen(string $action, $callable, $guard = '')
    {
        return $this->routes->add($this->createRoute($action, $callable, $guard));
    }

    public function createRoute(string $action, $callable, $guard = '')
    {
        return (new AjaxRoute($action, $callable, $guard))->setRouter($this);
    }

    /**
     * The AJAX URL with the specified action.
     *
     * @param string $action The action to resolve in the AJAX route handler.
     *
     * @return string
     */
    public function url(string $action): string
    {
        return $this->app->get('config')->get('ajax') . "?action={$action}";
    }
}
