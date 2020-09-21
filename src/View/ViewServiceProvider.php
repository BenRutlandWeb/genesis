<?php

namespace Genesis\View;

use Genesis\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->singleton('view', function ($app) {
            return new \Genesis\View\View($app->resourcesPath('views'));
        });

        $this->app->singleton('view.redirect', function () {
            return new \Genesis\View\TemplateRedirect();
        });
    }
}
