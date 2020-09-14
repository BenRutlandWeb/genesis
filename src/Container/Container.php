<?php

namespace Genesis\Container;

use Genesis\Contracts\Container as ContainerInterface;

class Container implements ContainerInterface
{
    /**
     * The container instance.
     *
     * @var \Genesis\Contracts\ContainerInterface
     */
    protected static $instance = null;

    protected $bindings = [];

    /**
     * Check if the ID exists in the container.
     *
     * @param string $id
     * @return boolean
     */
    public function has($id): bool
    {
        return isset($this->bindings[$id]);
    }

    /**
     * Get the ID from the container.
     *
     * @param string $id
     * @return mixed
     */
    public function get($id)
    {
        if ($this->has($id)) {
            return $this->bindings[$id];
        }
        throw new NotFoundException("No entry was found for '{$id}' identifier.");
    }


    /**
     * Get an instance of the container.
     *
     * @return \Genesis\Contracts\Container
     */
    public static function getInstance(): ContainerInterface
    {
        if (is_null(static::$instance)) {
            static::$instance = new static;
        }
        return static::$instance;
    }
}
