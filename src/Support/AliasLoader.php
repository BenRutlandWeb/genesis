<?php

namespace Genesis\Support;

class AliasLoader
{
    /**
     * The array of class aliases.
     *
     * @var array
     */
    protected $aliases;

    /**
     * Indicates if a loader has been registered.
     *
     * @var boolean
     */
    protected $registered = false;

    /**
     * The singleton instance of the loader.
     *
     * @var \Genesis\Support\AliasLoader
     */
    protected static $instance;

    /**
     * Create a new class alias loader instance.
     *
     * @param array $aliases
     *
     * @return void
     */
    public function __construct(array $aliases = [])
    {
        $this->aliases = $aliases;
    }

    /**
     * Get or create the singleton alias loader instance.
     *
     * @param array $aliases
     *
     * @return \Genesis\Support\AliasLoader
     */
    public static function getInstance(array $aliases = []): AliasLoader
    {
        if (is_null(static::$instance)) {
            static::$instance = new static($aliases);
        }
        $aliases = array_merge(static::$instance->getAliases(), $aliases);

        static::$instance->setAliases($aliases);

        return static::$instance;
    }

    /**
     * Load a class alias if it is registered.
     *
     * @param string $alias
     *
     * @return boolean
     */
    public function load(string $alias): bool
    {
        if (isset($this->aliases[$alias])) {
            return class_alias($this->aliases[$alias], $alias);
        }
        return false;
    }

    /**
     * Register the loader on the auto-loader stack.
     *
     * @return void
     */
    public function register(): void
    {
        if (!$this->registered) {
            $this->prependToLoaderStack();

            $this->registered = true;
        }
    }

    /**
     * Prepend the load method to the auto-loader stack.
     *
     * @return void
     */
    protected function prependToLoaderStack(): void
    {
        spl_autoload_register(array($this, 'load'), true, true);
    }

    /**
     * Get the registered aliases.
     *
     * @return array
     */
    public function getAliases(): array
    {
        return $this->aliases;
    }

    /**
     * Set the registered aliases.
     *
     * @param array $aliases
     *
     * @return void
     */
    public function setAliases(array $aliases): void
    {
        $this->aliases = $aliases;
    }

    /**
     * Set the value of the singleton alias loader.
     *
     * @param \Genesis\Support\AliasLoader $loader
     *
     * @return void
     */
    public static function setInstance(AliasLoader $loader): void
    {
        static::$instance = $loader;
    }
}
