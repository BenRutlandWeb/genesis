<?php

namespace Genesis\Routing;

use Genesis\Routing\Route;
use Illuminate\Support\Arr;

class AjaxRoute extends Route
{
    protected $guards = ['auth', 'guest'];

    public function __construct(string $action, $callable)
    {
        $this->action = $action;
        $this->callable = $callable;
    }

    public function run()
    {
        dump($this->router->groupStack);
        /*
        $ajax_action = function () {
            $this->verifyCSRFToken();
            echo call_user_func($this->resolveCallback($this->callable), $this->router->app->get('request'));
            die;
        };
        if (in_array('auth', $this->guards)) {
            add_action("wp_ajax_{$this->action}", $ajax_action);
        }
        if (in_array('guest', $this->guards)) {
            add_action("wp_ajax_nopriv_{$this->action}", $ajax_action);
        }*/
    }
    /*
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
        $csrf_middleware = $this->router->app->get('csrf');

        if (!$csrf_middleware->verify()) {
            $this->notAuthorized();
        }
    }

    public function notAuthorized()
    {
        header('HTTP/1.0 403 Forbidden');
        die('403 Forbidden');
    }
*/
}
