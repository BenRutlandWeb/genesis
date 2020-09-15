<?php

namespace Genesis\Support\Bootstrap;

use Genesis\Support\AliasLoader;
use Genesis\Support\Facades\Facade;
use Psr\Container\ContainerInterface;

class RegisterFacades
{
    public function bootstrap(ContainerInterface $app)
    {
        Facade::setFacadeApplication($app);

        $aliases = config('aliases');

        AliasLoader::getInstance($aliases)->register();
    }
}
