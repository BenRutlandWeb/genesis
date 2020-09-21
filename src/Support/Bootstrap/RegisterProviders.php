<?php

namespace Genesis\Support\Bootstrap;

use Genesis\Contracts\Application;

class RegisterProviders
{
    /**
     * Bootstrap the providers.
     *
     * @param \Genesis\Contracts\Application $app
     *
     * @return void
     */
    public function bootstrap(Application $app): void
    {
        $providers = $app->get('config')->get('providers');

        foreach ($providers as $provider) {
            $app->register($provider);
        }
    }
}
