<?php

namespace Genesis\Support\Bootstrap;

use Genesis\Contracts\Application;

class RegisterProviders
{
    public function bootstrap(Application $app)
    {
        $providers = config('providers');

        foreach ($providers as $provider) {
            $app->register($provider);
        }
    }
}
