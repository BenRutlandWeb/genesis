<?php

namespace Genesis\Bootstrap;

use Genesis\Contracts\Application;

class BootProviders
{
    public function bootstrap(Application $app)
    {
        $app->boot();
    }
}
