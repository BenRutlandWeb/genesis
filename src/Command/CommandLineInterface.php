<?php

namespace Genesis\Command;

use Illuminate\Support\Str;
use WP_CLI;

class CommandLineInterface
{
    /**
     * Make a controller.
     *
     * @param array $args
     *
     * @return void
     */
    public function controller(array $args): void
    {
        $filePath = app_path('Controllers/' . Str::studly($args[0]) . '.php');

        if (file_exists($filePath)) {
            WP_CLI::error("The controller '{$args[0]}' already exists");
        }
        $template = file_get_contents(__DIR__ . '/templates/controller.php');
        $template = str_replace('__CLASSNAME__', Str::studly($args[0]), $template);

        file_put_contents($filePath, $template);

        WP_CLI::success("Controller '{$args[0]}' created");
    }

    /**
     * Make a model.
     *
     * @param array $args
     *
     * @return void
     */
    public function model(array $args): void
    {
        $filePath = app_path('Models/' . Str::studly($args[0]) . '.php');

        if (file_exists($filePath)) {
            WP_CLI::error("The model '{$args[0]}' already exists");
        }
        $template = file_get_contents(__DIR__ . '/templates/model.php');
        $template = str_replace('__CLASSNAME__', Str::studly($args[0]), $template);
        $template = str_replace('__TABLENAME__', Str::snake($args[0]), $template);

        file_put_contents($filePath, $template);

        WP_CLI::success("Model '{$args[0]}' created");
    }

    /**
     * Make a provider.
     *
     * @param array $args
     *
     * @return void
     */
    public function provider(array $args): void
    {
        $filePath = app_path('Providers/' . Str::studly($args[0]) . '.php');

        if (file_exists($filePath)) {
            WP_CLI::error("The service provider '{$args[0]}' already exists");
        }
        $template = file_get_contents(__DIR__ . '/templates/provider.php');
        $template = str_replace('__CLASSNAME__', Str::studly($args[0]), $template);

        file_put_contents($filePath, $template);

        WP_CLI::success("ServiceProvider '{$args[0]}' created");
    }
}
