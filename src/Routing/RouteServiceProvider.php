<?php

namespace Genesis\Routing;

use Genesis\Support\ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind('csrf', function ($app) {
            return $app->call(\Genesis\Routing\CSRFToken::class, $app->get('request'));
        });
        $this->app->singleton('route.ajax', function ($app) {
            return $app->call(\Genesis\Routing\AjaxRouter::class, $app);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton('url', function ($app) {
            return $app->call(\Genesis\Routing\URLGenerator::class, $app);
        });
        #require base_path('routes/ajax.php');

        $router = $this->app->get('route.ajax');

        $router->middleware('ajax')->group(base_path('routes/ajax.php'));



        $router->run();
    }
}
