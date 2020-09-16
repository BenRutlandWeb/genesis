<?php

namespace Genesis\Routing;

use Illuminate\Support\Arr;

class Ajax
{
    protected $actions = [];

    public function __construct($app)
    {
        $this->app = $app;
    }

    /**
     * Listen to an AJAX action.
     *
     * @param string         $action
     * @param string|Closure $callable
     * @param string|array   $guard
     * @return void
     */
    public function listen(string $action, $callable, $guard = ['auth', 'guest'])
    {
        $ajax_action = function () use ($callable) {
            $this->verifyCSRFToken();
            echo call_user_func($this->resolveCallback($callable), $this->app->get('request'));
            die;
        };

        $guard = Arr::wrap($guard);

        if (in_array('auth', $guard)) {
            add_action("wp_ajax_{$action}", $ajax_action);
        }
        if (in_array('guest', $guard)) {
            add_action("wp_ajax_nopriv_{$action}", $ajax_action);
        }
    }


    public function resolveCallback($callable)
    {
        if (is_callable($callable)) {
            return $callable;
        }
        if (class_exists($callable)) {
            return new $callable;
        }
    }


    public function verifyCSRFToken()
    {
        $csrf_middleware = $this->app->get('csrf');

        if (!$csrf_middleware->verify()) {
            $this->notAuthorized();
        }
    }

    public function notAuthorized()
    {
        header('HTTP/1.0 403 Forbidden');
        die('403 Forbidden');
    }

    /**
     * The AJAX URL with the specified action.
     *
     * @param string $action The action to resolve in the AJAX route handler.
     *
     * @return string
     */
    public function url(string $action)
    {
        return admin_url("admin-ajax.php?action={$action}");
    }
}
