<?php

namespace Genesis\Bootstrap;

use Genesis\App;

class BootProviders
{
    public function bootstrap(App $app)
    {
        $app->boot();
    }
}
