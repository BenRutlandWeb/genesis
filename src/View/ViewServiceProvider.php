<?php

namespace Genesis\View;

use Genesis\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton('view', function ($app) {
            return $app->call(\Genesis\View\View::class, $app);
        });
    }
}
