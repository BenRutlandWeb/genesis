<?php

namespace Genesis\Support\Bootstrap;

use Genesis\Contracts\Application;
use Genesis\Support\AliasLoader;
use Genesis\Support\Facades\Facade;

class RegisterFacades
{
    /**
     * Register the facades and aliases.
     *
     * @param \Genesis\Contracts\Application $app
     *
     * @return void
     */
    public function bootstrap(Application $app): void
    {
        Facade::setFacadeApplication($app);

        $aliases = $app->get('config')->get('aliases');

        AliasLoader::getInstance($aliases)->register();
    }
}
