<?php

namespace Genesis\Foundation;

use Genesis\Foundation\AliasLoader;
use Illuminate\Support\Facades\Facade;

class RegisterFacades
{
    public function bootstrap($app)
    {
        Facade::setFacadeApplication($app);

        AliasLoader::getInstance(config('aliases'))->register();
    }
}
