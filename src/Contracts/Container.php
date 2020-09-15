<?php

namespace Genesis\Contracts;

use Closure;
use Psr\Container\ContainerInterface;

interface Container extends ContainerInterface
{
    /**
     * Register a binding with the Container.
     *
     * @param string  $id
     * @param Closure $closure
     *
     * @return void
     */
    public function bind(string $id, Closure $closure): void;

    /**
     * Register a singleton with the Container.
     *
     * @param string  $id
     * @param Closure $closure
     *
     * @return void
     */
    public function singleton(string $id, Closure $closure): void;

    /**
     * Register an instance with the Container.
     *
     * @param string $id
     * @param mixed  $instance
     *
     * @return void
     */
    public function instance(string $id, $instance): void;

    /**
     * Call the given clsoure/class method.
     *
     * @param callable|string $callback
     * @param mixed           ...$params
     *
     * @return mixed
     */
    public function call($callback, ...$params);

    /**
     * Call a binding from the contianer.
     *
     * @param string $id
     * @param mixed  ...$params
     *
     * @return mixed
     */
    public function make(string $id, ...$params);
}
