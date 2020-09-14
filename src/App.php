<?php

namespace Genesis;

use Genesis\Container\Container;

class App extends Container
{
    /**
     * The Genesis framework version.
     *
     * @var string
     */
    protected const VERSION = '1.0.0';

    /**
     * The base path for the Genesis installation.
     *
     * @var string
     */
    protected $basePath = '';

    /**
     * Create a new Genesis application instance.
     *
     * @param string|null $basePath
     * @return void
     */
    public function __construct(?string $basePath = null)
    {
        if ($basePath) {
            $this->setBasePath($basePath);
        }
        $this->registerBaseBindings();
        $this->registerBaseServiceProviders();
        $this->registerCoreContainerAliases();
    }

    /**
     * Get the version number of the application.
     *
     * @return string
     */
    public function version(): string
    {
        return static::VERSION;
    }

    /**
     * Set the app base path.
     *
     * @param string $basePath
     * @return \Genesis\Contracts\Container
     */
    public function setBasePath(string $basePath): Container
    {
        $this->basePath = rtrim($basePath, '\/');

        $this->bindPathsInContainer();

        return $this;
    }

    /**
     * Bind all of the application paths in the container.
     *
     * @return void
     */
    protected function bindPathsInContainer(): void
    {
        $this->instance('path.base', $this->basePath());
        $this->instance('path.app', $this->appPath());
    }

    /**
     * Get the base path of the Genesis installation.
     *
     * @param  string  $path Optionally, a path to append to the base path
     * @return string
     */
    public function basePath(string $path = ''): string
    {
        return $path ? $this->basePath . '/' . $path : $this->basePath;
    }

    /**
     * Get the path to the application "app" directory.
     *
     * @param  string  $path
     * @return string
     */
    public function appPath(string $path = ''): string
    {
        $appPath = $this->basePath . '/app';
        return $path ? $appPath . '/' . $path : $appPath;
    }

    /**
     * Get the path to the application configuration files.
     *
     * @param  string  $path Optionally, a path to append to the config path
     * @return string
     */
    public function configPath(string $path = ''): string
    {
        $configPath = $this->basePath . '/config';
        return $path ? $configPath . '/' . $path : $configPath;
    }

    /**
     * Register the basic bindings into the container.
     *
     * @return void
     */
    public function registerBaseBindings(): void
    {
        static::setInstance($this);

        $this->instance('app', $this);
    }

    /**
     * Register all of the base service providers.
     *
     * @return void
     */
    public function registerBaseServiceProviders(): void
    {
        # code...
    }

    /**
     * Register the core class aliases in the container.
     *
     * @return void
     */
    public function registerCoreContainerAliases(): void
    {
        $aliases = [
            'request' => \Genesis\Http\Request::class,
            'url'     => \Genesis\Routing\URLGenerator::class,
        ];

        foreach ($aliases as $id => $instance) {
            $this->singleton($id, function ($app) use ($instance) {
                return new $instance;
            });
        }
    }
}
