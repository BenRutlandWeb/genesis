<?php

namespace Genesis\Support\Facades;

use Genesis\Support\Facades\Facade;

class File extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'files';
    }
}
