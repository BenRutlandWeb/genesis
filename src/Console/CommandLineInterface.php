<?php

namespace Genesis\Console;

use Illuminate\Support\Str;

class CommandLineInterface
{
    /**
     * The app base path.
     *
     * @var string
     */
    protected $basePath;

    /**
     * Boot the CLI
     *
     * @param string $basePath
     * @param array $argv
     *
     * @return void
     */
    public function __construct(string $basePath, array $argv)
    {
        $this->basePath = $basePath;
        $command = array_shift($argv);
        $method = array_shift($argv);

        if (empty($argv)) {
            $this->error('No arguments were passed.');
        }
        if (!method_exists($this, $method)) {
            $this->error('That command is invalid.');
        }
        call_user_func([$this, $method], $argv);
    }

    /**
     * Print and error message.
     *
     * @param string $str
     * @return void
     */
    public function error(string $str): void
    {
        print("\033[31mError:\033[0m {$str}");
    }

    /**
     * Print a success message
     *
     * @param string $str
     *
     * @return void
     */
    public function success(string $str): void
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
            die($this->error("The controller '{$args[0]}' already exists"));
        }
        $template = file_get_contents(__DIR__ . '/templates/controller.php');
        $template = str_replace('__CLASSNAME__', Str::studly($args[0]), $template);

        file_put_contents($filePath, $template);

        $this->success("Controller '{$args[0]}' created");
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
            die($this->error("The model '{$args[0]}' already exists"));
        }
        $template = file_get_contents(__DIR__ . '/templates/model.php');
        $template = str_replace('__CLASSNAME__', Str::studly($args[0]), $template);
        $template = str_replace('__TABLENAME__', Str::snake($args[0]), $template);

        file_put_contents($filePath, $template);

        $this->success("Model '{$args[0]}' created");
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
            die($this->error("The service provider '{$args[0]}' already exists"));
        }
        $template = file_get_contents(__DIR__ . '/templates/provider.php');
        $template = str_replace('__CLASSNAME__', Str::studly($args[0]), $template);

        file_put_contents($filePath, $template);

        $this->success("ServiceProvider '{$args[0]}' created");

        $configPath = $this->basePath . '/config/app.php';
        $config = file_get_contents($configPath);

        $template = str_replace("'providers' => [", "'providers' => [\n        \\App\\Providers\\" . Str::studly($args[0]) . "::class,", $config);

        file_put_contents($configPath, $template);
    }
}
