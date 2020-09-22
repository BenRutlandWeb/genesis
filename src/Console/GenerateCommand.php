<?php

namespace Genesis\Console;

use Genesis\Console\Command;
use Genesis\Filesystem\Filesystem;


abstract class GenerateCommand extends Command
{
    /**
     * The filesystem
     *
     * @var \Genesis\Filesystem\Filesystem
     */
    protected $files;

    /**
     * Assign the filesystem
     *
     * @param \Genesis\Filesystem\Filesystem $files
     *
     * @return void
     */
    public function __construct(Filesystem $files)
    {
        $this->files = $files;
    }

    /**
     * Handle the command.
     *
     * @return void
     */
    protected function handle(): void
    {
        $name = $this->argument('name');

        $path = $this->getPath($name);

        if ((!$this->hasOption('force') || !$this->option('force')) &&
            $this->alreadyExists($path)
        ) {
            $this->error($this->type . ' already exists!');
        }

        $this->makeDirectory($path);

        $this->files->put($path, $this->buildClass($name));

        $this->success($this->type . ' created successfully.');
    }

    /**
     * Get the file path.
     *
     * @param string $name
     *
     * @return string
     */
    protected function getPath(string $name): string
    {
        return $this->app->basePath($this->qualifyClass("{$this->namespace}/{$name}.php"));
    }

    /**
     * Format the class name.
     *
     * @param string $name
     *
     * @return string
     */
    public function qualifyClass(string $name): string
    {
        return str_replace('\\', '/', $name);
    }

    /**
     * Build the class.
     *
     * @param string $name
     *
     * @return string
     */
    protected function buildClass(string $name): string
    {
        $stub = $this->files->get($this->getStub());

        return $this->replaceNamespace($stub, $this->namespace)->replaceClass($stub, $name);
    }

    /**
     * Replace the namespace.
     *
     * @param string $stub
     * @param string $namespace
     * @return void
     */
    protected function replaceNamespace(string &$stub, string $namespace): self
    {
        $stub = str_replace('{{ namespace }}', $namespace, $stub);

        return $this;
    }

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
        return str_replace('{{ class }}', $class, $stub);
    }

    /**
     * Check if the file exists
     *
     * @param string $path
     * @return bool
     */
    public function alreadyExists(string $path): bool
    {
        return $this->files->exists($path);
    }

    /**
     * Make the directory if it doesn't exist.
     *
     * @param string $path
     * @return void
     */
    protected function makeDirectory(string $path): string
    {
        if (!$this->files->isDirectory(dirname($path))) {
            $this->files->makeDirectory(dirname($path));
        }
        return $path;
    }

    /**
     * Return the stub file path
     *
     * @return string
     */
    abstract protected function getStub(): string;
}
