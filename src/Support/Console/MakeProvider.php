<?php

namespace Genesis\Support\Console;

use Genesis\Console\GenerateCommand;

class MakeProvider extends GenerateCommand
{
    protected $name = 'make:provider';

    protected $type = 'Provider';

    protected $namespace = 'App\Providers';

    /**
     * Return the stub file path
     *
     * @return string
     */
    protected function getStub(): string
    {
        return __DIR__ . '/stubs/provider.stub';
    }

    protected function getArguments(): array
    {
        return [
            'name'
        ];
    }
}
