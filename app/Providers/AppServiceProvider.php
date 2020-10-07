<?php

namespace App\Providers;

use Genesis\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->instance('assets', new \App\Services\Assets());
        $this->app->instance('menus', new \App\Services\RegisterMenus());
        $this->app->instance('themesupport', new \App\Services\ThemeSupport());
        $this->app->instance('wp.tidy', new \App\Services\TidyHead());
    }
}
