<?php

namespace Genesis\View;

use eftec\bladeone\BladeOne;

class View
{
    public function __construct($app)
    {
        $views = $app->resourcesPath('views');

        $cache = $app->basePath('storage/framework/cache');

        $this->blade = new BladeOne($views, $cache);
    }

    /**
     * Make a view.
     *
     * @param string $view
     * @param array $args
     *
     * @return void
     */
    public function make(string $view, array $args = [])
    {
        return $this->blade->run($view, $args);
    }
}
