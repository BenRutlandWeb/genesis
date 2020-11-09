<?php

namespace App\Providers;

use Genesis\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event handler mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'admin_menu' => [
            \App\Listeners\AddMenuPages::class,
        ],
        'after_setup_theme' => [
            \App\Listeners\RegisterNavMenus::class,
            \App\Listeners\AddThemeSupport::class,
        ],
    ];

    /**
     * The subscriber classes to register.
     *
     * @var array
     */
    protected $subscribe = [
        \App\Listeners\EnqueueScripts::class,
        \App\Listeners\TidyHead::class,
        \App\Listeners\AuthGuard::class,
    ];
}
