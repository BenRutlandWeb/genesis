<?php

namespace Genesis\Support\Bootstrap;

use Genesis\Contracts\Application;
use Genesis\Config\Repository;

class LoadConfiguration
{

    public function bootstrap(Application $app)
    {
        $app->singleton('config', function ($app) {
            return new Repository(require config_path('app.php'));
        });
    }
}
