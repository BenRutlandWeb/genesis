<?php

namespace Genesis\Contracts;

use Closure;
use Psr\Container\ContainerInterface;

interface Container extends ContainerInterface
{

    /**
     * Call the given closure/constructor or method.
     *
     * @param Closure|array|string $callable
     * @param mixed ...$params
     * @return mixed
     */
    public function call($callable, ...$params);

    /**
     * Call a binding in the container with the ID.
     *
     * @param string $id
     * @param mixed ...$params
     * @return mixed
     */
    public function make(string $id, ...$params);

    /**
     * Register a binding with the container.
     *
     * @param string $id
     * @param Closure $closure
     * @param boolean $share
     * @return void
     */
    public function bind(string $id, Closure $closure, $share = false);

    /**
     * Register a singleton with the container.
     *
     * @param string $id
     * @param Closure $closure
     * @return void
     */
    public function singleton(string $id, Closure $closure);

    /**
     * Register an instance with the container.
     *
     * @param string $id
     * @param mixed $instance
     * @return void
     */
    public function instance(string $id, $instance);

    /**
     * Return an instance of the container.
     *
     * @return \Genesis\Contracts\Container
     */
    public static function getInstance(): Container;

    /**
     * Set the shared instance of the container.
     *
     * @return \Genesis\Contracts\Container
     */
    public static function setInstance(Container $app = null): Container;
}
