<?php

namespace Genesis\Routing;

use Genesis\Support\ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton('route.ajax', function ($app) {
            return $app->call(\Genesis\Routing\Ajax::class, $app);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        require base_path('routes/ajax.php');
    }
}
