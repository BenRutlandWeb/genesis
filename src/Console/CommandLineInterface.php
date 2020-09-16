<?php

namespace Genesis\Console;

use Illuminate\Support\Str;

class CommandLineInterface
{
    public function __construct($basePath, $argv)
    {
        $this->basePath = $basePath;
        $command = array_shift($argv);
        $method = array_shift($argv);

        call_user_func([$this, $method], $argv);
    }

    public function error($str)
    {
        die("\033[31mError:\033[0m {$str}");
    }

    public function success($str)
    {
        print("\033[32mSuccess:\033[0m {$str}\n");
    }
    /**
     * Make a controller.
     *
     * @param array $args
     *
     * @return void
     */
    public function controller(array $args): void
    {
        $dirPath = $this->basePath . '/app/Controllers';
        if (!file_exists($dirPath)) {
            mkdir($dirPath);
        }
        $filePath = $dirPath . '/' . Str::studly($args[0]) . '.php';

        if (file_exists($filePath)) {
            $this->error("The controller '{$args[0]}' already exists");
        }
        $template = file_get_contents(__DIR__ . '/templates/controller.php');
        $template = str_replace('__CLASSNAME__', Str::studly($args[0]), $template);

        file_put_contents($filePath, $template);

        $this->success("Controller '{$args[0]}' created");
        die();
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
        $dirPath = $this->basePath . '/app/Models';
        if (!file_exists($dirPath)) {
            mkdir($dirPath);
        }
        $filePath = $dirPath . '/' . Str::studly($args[0]) . '.php';

        if (file_exists($filePath)) {
            $this->error("The model '{$args[0]}' already exists");
        }
        $template = file_get_contents(__DIR__ . '/templates/model.php');
        $template = str_replace('__CLASSNAME__', Str::studly($args[0]), $template);
        $template = str_replace('__TABLENAME__', Str::snake($args[0]), $template);

        file_put_contents($filePath, $template);

        $this->success("Model '{$args[0]}' created");
        die();
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
        $dirPath = $this->basePath . '/app/Providers';
        if (!file_exists($dirPath)) {
            mkdir($dirPath);
        }
        $filePath = $dirPath . '/' . Str::studly($args[0]) . '.php';

        if (file_exists($filePath)) {
            $this->error("The service provider '{$args[0]}' already exists");
        }
        $template = file_get_contents(__DIR__ . '/templates/provider.php');
        $template = str_replace('__CLASSNAME__', Str::studly($args[0]), $template);

        file_put_contents($filePath, $template);

        $this->success("ServiceProvider '{$args[0]}' created");
        die();
    }
}
