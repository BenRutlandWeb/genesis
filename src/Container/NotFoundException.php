<?php

namespace Genesis\Container;

use Genesis\Container\ContainerException;
use Psr\Container\NotFoundExceptionInterface;

class NotFoundException extends ContainerException implements NotFoundExceptionInterface
{
}
