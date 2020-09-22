<?php

namespace Genesis\Support\Console;

use Genesis\Console\GenerateCommand;

class MakeController extends GenerateCommand
{
    protected $name = 'make:controller';

    protected $type = 'Controller';

    protected $namespace = 'App\Controllers';

    /**
     * Return the stub file path
     *
     * @return string
     */
    protected function getStub(): string
    {
        return __DIR__ . '/stubs/controller.stub';
    }

    protected function getArguments(): array
    {
        return [
            'name'
        ];
    }
}
