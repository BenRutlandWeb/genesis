<?php

namespace Genesis\Support\Bootstrap;

use Genesis\Contracts\Application;
use Genesis\Config\Repository;

class LoadConfiguration
{
    /**
     * Load the configuration files.
     *
     * @param \Genesis\Contracts\Application $app
     *
     * @return void
     */
    public function bootstrap(Application $app): void
    {
        $app->singleton('config', function ($app) {
            $config = require $app->configPath('app.php');
            return $app->call(Repository::class, $config);
        });
    }
}
