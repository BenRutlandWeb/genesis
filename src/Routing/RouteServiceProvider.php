<?php

namespace Genesis\Routing;

use Genesis\Support\ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind('csrf', function ($app) {
            return $app->call(\Genesis\Http\Middleware\VerifyCsrfToken::class, $app->get('request'));
        });
        $this->app->singleton('route.ajax', function ($app) {
            return $app->call(\Genesis\Routing\AjaxRouter::class, $app);
        });
        $this->app->singleton('route.api', function ($app) {
            return $app->call(\Genesis\Routing\Router::class, $app);
        });
        $this->app->singleton('url', function ($app) {
            return $app->call(\Genesis\Routing\URLGenerator::class, $app);
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
