<?php

namespace Genesis;

use Genesis\Container\Container;

class App extends Container
{
    protected const VERSION = '1.0.0';

    protected $basePath = '';

    public function __construct(?string $basePath = null)
    {
        if ($basePath) {
            $this->setBasePath($basePath);
        }
        $this->registerBaseBindings();
        $this->registerServiceProviders();
        $this->registerCoreContainerAliases();
    }

    /**
     * Get the version number of the application.
     *
     * @return string
     */
    public function version()
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
    protected function bindPathsInContainer()
    {
        $this->instance('path.base', $this->basePath());
        $this->instance('path.app', $this->appPath());
    }

    public function basePath($path = '')
    {
        return $path ? $this->basePath . '/' . $path : $this->basePath;
    }

    public function appPath($path = '')
    {
        $appPath = $this->basePath . '/app';
        return $path ? $appPath . '/' . $path : $appPath;
    }

    public function registerBaseBindings()
    {
        static::setInstance($this);

        $this->instance('app', $this);
    }

    public function registerServiceProviders()
    {
        # code...
    }

    public function registerCoreContainerAliases()
    {
        $aliases = [
            'url' => \Genesis\Routing\URLGenerator::class,
        ];
        foreach ($aliases as $id => $instance) {
            $this->singleton($id, function ($app) use ($instance) {
                return new $instance;
            });
        }
    }
}
