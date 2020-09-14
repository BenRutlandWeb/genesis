<?php

namespace Genesis;

class Singleton
{
    public function __construct()
    {
        echo '__construct';
    }
    public function method()
    {
        echo 'method';
    }
    public function __invoke()
    {
        echo '__invoke';
    }
}
