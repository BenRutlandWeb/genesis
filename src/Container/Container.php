<?php

namespace Genesis\Container;

use Closure;
use Genesis\Contracts\Container as ContainerInterface;

class Container implements ContainerInterface
{
    /**
     * The container bindings.
     *
     * @var array
     */
    protected $bindings = [];

    /**
     * Call the given closure/constructor or method.
     *
     * @param Closure|array|string $callable
     * @param mixed ...$params
     * @return mixed
     */
    public function call($callable, ...$params)
    {
        if (is_callable($callable)) {
            return $callable(...$params);
        }
        if (is_string($callable) && class_exists($callable)) {
            return new $callable(...$params);
        }
        return $callable;
    }

    /**
     * Call a binding in the container with the ID.
     *
     * @param string $id
     * @param mixed ...$params
     * @return mixed
     */
    public function make(string $id, ...$params)
    {
        return $this->call($this->resolve($id), ...$params);
    }

    /**
     * Resolve the container binding.
     *
     * @param string $id
     * @return void
     */
    public function resolve(string $id)
    {
        if ($this->has($id)) {
            return $this->get($id);
        }
        return $id;
    }

    /**
     * Register a binding with the container.
     *
     * @param string $id
     * @param Closure $closure
     * @param boolean $share
     * @return void
     */
    public function bind(string $id, Closure $closure, $share = false): void
    {
        if ($share) {
            $closure = $this->call($closure, $this);
        }
        $this->bindings[$id] = $closure;
    }

    /**
     * Register a singleton with the container.
     *
     * @param string $id
     * @param Closure $closure
     * @return void
     */
    public function singleton(string $id, Closure $closure): void
    {
        $this->bind($id, $closure, true);
    }

    /**
     * Register an instance with the container.
     *
     * @param string $id
     * @param mixed $instance
     * @return void
     */
    public function instance(string $id, $instance): void
    {
        $this->bindings[$id] = $instance;
    }

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
            return $this->call($this->bindings[$id], $this);
        }
        throw new NotFoundException("No entry was found for '{$id}' identifier.");
    }
}
