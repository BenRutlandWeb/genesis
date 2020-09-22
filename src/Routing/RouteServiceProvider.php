<?php

namespace Genesis\Routing;

use Genesis\Support\ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind('csrf', function ($app) {
            return new \Genesis\Http\Middleware\VerifyCsrfToken($app->get('request'));
        });
        $this->app->singleton('route.ajax', function ($app) {
            return new \Genesis\Routing\AjaxRouter($app);
        });
        $this->app->singleton('route.api', function ($app) {
            return new \Genesis\Routing\Router($app);
        });
        $this->app->singleton('url', function ($app) {
            return new \Genesis\Routing\URLGenerator($app);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->get('route.ajax')->register();
        $this->app->get('route.api')->register();
    }
}
