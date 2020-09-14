<?php

namespace Genesis;

use Genesis\Container\Container;

class App extends Container
{
    protected const VERSION = '1.0.0';

    protected $basePath = '';

    public function __construct(?string $basePath = null)
    {
        if ($basePath) {
            $this->setBasePath($basePath);
        }
        $this->registerBaseBindings();
    }

    public function setBasePath(string $path)
    {
        $this->basePath = $path;
    }

    public function registerBaseBindings()
    {
        # code...
    }
}
