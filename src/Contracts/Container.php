<?php

namespace Genesis\Contracts;

use Psr\Container\ContainerInterface;

interface Container extends ContainerInterface
{
    /**
     * Return an instance of the container.
     *
     * @return \Genesis\Contracts\Container
     */
    public static function getInstance(): Container;
}
