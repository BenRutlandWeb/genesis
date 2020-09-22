<?php

namespace Genesis\Support\Console;

use Genesis\Console\GenerateCommand;

class MakeModel extends GenerateCommand
{
    protected $name = 'make:model';

    protected $type = 'Model';

    protected $namespace = 'App\Models';

    /**
     * Replace the placeholders.
     *
     * @param string $stub
     * @param string $class
     *
     * @return string
     */
    protected function replaceClass(string $stub, string $class): string
    {
        return str_replace(['{{ class }}', '{{ table }}'], [$class, strtolower($class)], $stub);
    }

    /**
     * Return the stub file path
     *
     * @return string
     */
    protected function getStub(): string
    {
        return __DIR__ . '/stubs/model.stub';
    }

    protected function getArguments(): array
    {
        return [
            'name'
        ];
    }
}
