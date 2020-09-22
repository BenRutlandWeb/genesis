<?php

namespace Genesis\Console;

use Genesis\Support\ServiceProvider;
use WP_CLI;

class ConsoleServiceProvider extends ServiceProvider
{
    protected $commands = [
        'console.make.controller',
        'console.make.model',
        'console.make.provider',
    ];

    /**
     * Register the console commands.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->singleton('console.make.controller', function ($app) {
            $command = new \Genesis\Support\Console\MakeController($app->get('files'));
            return $command->setInstance($app);
        });
        $this->app->singleton('console.make.model', function ($app) {
            $command = new \Genesis\Support\Console\MakeModel($app->get('files'));
            return $command->setInstance($app);
        });
        $this->app->singleton('console.make.provider', function ($app) {
            $command = new \Genesis\Support\Console\MakeProvider($app->get('files'));
            return $command->setInstance($app);
        });
    }

    /**
     * Register the filesystem.
     *
     * @return void
     */
    public function boot(): void
    {
        if (!class_exists(WP_CLI::class)) {
            return;
        }
        foreach ($this->commands as $command) {
            $this->app->get($command)->add();
        }
    }
}
