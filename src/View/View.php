<?php

namespace Genesis\View;

use eftec\bladeone\BladeOne;

class View
{
    public function __construct($app)
    {
        $views = $app->resourcesPath('views');
        $cache = $app->basePath('storage/framework/cache');

        $this->blade = new BladeOne($views, $cache, BladeOne::MODE_DEBUG); // MODE_DEBUG allows to pinpoint troubles.
    }
    public function make(string $view, array $args = [])
    {
        return $this->blade->run($view, $args);
    }
}
