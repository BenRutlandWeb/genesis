<?php

namespace Genesis;

use Genesis\Container\Container;
use Genesis\Contracts\Application as ApplicationInterface;
use Genesis\Support\ServiceProvider;

class Application extends Container implements ApplicationInterface
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
     * Indicates if the application has been "bootstrapped".
     *
     * @var boolean
     */
    protected $bootstrapped = false;

    /**
     * Indicates if the application has "booted".
     *
     * @var boolean
     */
    protected $booted = false;

    /**
     * All of the registered service providers.
     *
     * @var array
     */
    protected $serviceProviders = [];

    /**
     * The container instance.
     *
     * @var \Genesis\Contracts\Application
     */
    protected static $instance = null;

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
        $this->bootstrapApplication();
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
     * @return \Genesis\Contracts\Application
     */
    public function setBasePath(string $basePath): ApplicationInterface
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
        $this->instance('path.config', $this->configPath());
    }

    /**
     * Get the base path of the Genesis installation.
     *
     * @param string $path
     *
     * @return string
     */
    public function basePath(string $path = ''): string
    {
        return $this->basePath . ($path ? '/' . $path : '');
    }

    /**
     * Get the path to the application "app" directory.
     *
     * @param string $path
     *
     * @return string
     */
    public function appPath(string $path = ''): string
    {
        return $this->basePath . '/app' . ($path ? '/' . $path : '');
    }

    /**
     * Get the path to the application configuration files.
     *
     * @param string $path
     *
     * @return string
     */
    public function configPath(string $path = ''): string
    {
        return $this->basePath . '/config' . ($path ? '/' . $path : '');
    }

    /**
     * Register the basic bindings into the container.
     *
     * @return void
     */
    protected function registerBaseBindings(): void
    {
        static::setInstance($this);

        $this->instance('app', $this);
    }

    /**
     * Register all of the base service providers.
     *
     * @return void
     */
    protected function registerBaseServiceProviders(): void
    {
        #$this->register(new \Genesis\ServiceProvider($this));
    }

    /**
     * Register the core class aliases in the container.
     *
     * @return void
     */
    protected function registerCoreContainerAliases(): void
    {
        $aliases = [
            'auth'    => \Genesis\Auth\Auth::class,
            'request' => \Genesis\Http\Request::class,
            'url'     => \Genesis\Routing\URLGenerator::class,
        ];

        foreach ($aliases as $id => $instance) {
            $this->singleton($id, function ($app) use ($instance) {
                return $app->call($instance);
            });
        }
    }

    /**
     * Bootstrap the application
     *
     * @return void
     */
    protected function bootstrapApplication(): void
    {
        $bootstrappers = [
            \Genesis\Support\Bootstrap\LoadConfiguration::class,
            \Genesis\Support\Bootstrap\RegisterFacades::class,
        ];

        foreach ($bootstrappers as $bootstrapper) {
            $this->call($bootstrapper)->bootstrap($this);
        }
        $this->boot();
    }

    /**
     * Register a service provider with the application.
     *
     * @param \Genesis\Support\ServiceProvider|string $provider
     *
     * @return \Genesis\Support\ServiceProvider
     */
    public function register($provider): ServiceProvider
    {
        if (is_string($provider)) {
            $provider = $this->resolveProvider($provider);
        }

        $provider->register();

        $this->serviceProviders[] = $provider;

        if ($this->isBooted()) {
            $this->bootProvider($provider);
        }

        return $provider;
    }

    /**
     * Resolve a service provider instance from the class name.
     *
     * @param string $provider
     *
     * @return \Genesis\Support\ServiceProvider
     */
    public function resolveProvider(string $provider): ServiceProvider
    {
        return new $provider($this);
    }

    /**
     * Determine if the application has booted.
     *
     * @return boolean
     */
    public function isBooted(): bool
    {
        return $this->booted;
    }

    /**
     * Boot the application's service providers.
     *
     * @return void
     */
    public function boot(): void
    {
        if ($this->isBooted()) {
            return;
        }
        foreach ($this->serviceProviders as $provider) {
            $this->bootProvider($provider);
        }
        $this->booted = true;
    }

    /**
     * Boot the given service provider.
     *
     * @param \Genesis\Support\ServiceProvider $provider
     *
     * @return mixed
     */
    protected function bootProvider(ServiceProvider $provider)
    {
        if (method_exists($provider, 'boot')) {
            return $this->call([$provider, 'boot']);
        }
    }

    /**
     * Get an instance of the container.
     *
     * @return \Genesis\Contracts\Application
     */
    public static function getInstance(): ApplicationInterface
    {
        if (is_null(static::$instance)) {
            static::$instance = new static;
        }
        return static::$instance;
    }

    /**
     * Set the shared instance of the container.
     *
     * @param \Genesis\Contracts\Application|null $app
     *
     * @return \Genesis\Contracts\Application
     */
    public static function setInstance(?ApplicationInterface $app = null): ApplicationInterface
    {
        return static::$instance = $app;
    }
}
