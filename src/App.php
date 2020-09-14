<?php

namespace Genesis;

use Genesis\Container\Container;
use Genesis\Support\ServiceProvider;

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
     * Indicates if the application has "booted".
     *
     * @var bool
     */
    protected $booted = false;

    /**
     * All of the registered service providers.
     *
     * @var array
     */
    protected $serviceProviders = [];

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
        $this->singleton('db.connection', function ($app) {
            return \WPEloquent\Database::connect();
        });
        (new \Genesis\Bootstrap\BootstrapServiceProvider($this))->register();
    }

    /**
     * Register the core class aliases in the container.
     *
     * @return void
     */
    public function registerCoreContainerAliases(): void
    {
        $aliases = [
            'auth'    => \Genesis\Auth::class,
            'request' => \Genesis\Http\Request::class,
            'url'     => \Genesis\Routing\URLGenerator::class,
        ];

        foreach ($aliases as $id => $instance) {
            $this->singleton($id, function ($app) use ($instance) {
                return new $instance;
            });
        }
    }

    public function bootstrapWith(array $bootstrappers)
    {
        $this->hasBeenBootstrapped = true;

        foreach ($bootstrappers as $bootstrapper) {
            $this->make($bootstrapper)->bootstrap($this);
        }
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

        $this->markAsRegistered($provider);

        if ($this->isBooted()) {
            $this->bootProvider($provider);
        }

        return $provider;
    }

    /**
     * Resolve a service provider instance from the class name.
     *
     * @param  string  $provider
     * @return \Genesis\Support\ServiceProvider
     */
    public function resolveProvider(string $provider): ServiceProvider
    {
        return new $provider($this);
    }

    /**
     * Mark the given provider as registered.
     *
     * @param \Genesis\Support\ServiceProvider $provider
     *
     * @return void
     */
    protected function markAsRegistered(ServiceProvider $provider): void
    {
        $this->serviceProviders[] = $provider;
    }

    /**
     * Boot the given service provider.
     *
     * @param  \Genesis\Support\ServiceProvider  $provider
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
     * Determine if the application has booted.
     *
     * @return bool
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
        array_walk($this->serviceProviders, function ($provider) {
            $this->bootProvider($provider);
        });

        $this->booted = true;
    }
}
