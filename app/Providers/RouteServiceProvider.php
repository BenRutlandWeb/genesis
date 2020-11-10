<?php

namespace App\Providers;

use Genesis\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Genesis\Support\Facades\Ajax;
use Genesis\Support\Facades\Event;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot(): void
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapAjaxRoutes();

        $this->mapApiRoutes();
    }

    /**
     * Define the "ajax" routes for the application.
     *
     * These routes all receive CSRF protection, etc.
     *
     * @return void
     */
    protected function mapAjaxRoutes()
    {
        Ajax::middleware('ajax')->group(base_path('routes/ajax.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Event::listen('rest_api_init', function () {
            $this->app->make('router.api')
                ->middleware('api')
                ->group(base_path('routes/api.php'));
        });
    }
}
