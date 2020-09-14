<?php

namespace Genesis\Bootstrap;

use Genesis\Contracts\Container;
use Genesis\Foundation\AliasLoader;
use Genesis\Support\Facades\Facade;

class RegisterFacades
{
    public function bootstrap(Container $app)
    {


        Facade::setFacadeApplication($app);

        AliasLoader::getInstance([
            'Ajax' => \Genesis\Support\Facades\Ajax::class,
            'Auth' => \Genesis\Support\Facades\Auth::class,
        ])->register();
    }
}
