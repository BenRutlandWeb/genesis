<?php

namespace App\Console\Commands;

use ReflectionClass;
use Genesis\Console\Command;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Symfony\Component\Finder\Finder;

class Migrate extends Command
{
    /**
     * The command signature.
     *
     * @var string
     */
    protected $signature = 'migrate';

    /**
     * The command description.
     *
     * @var string
     */
    protected $description = '';

    /**
     * Handle the command call.
     *
     * @return void
     */
    protected function handle(): void
    {
        $this->load(app_path('Database/Migrations'));

        $this->success('Done');
    }

    /**
     * Load the console commands
     *
     * @param string|array $paths
     *
     * @return void
     */
    public function load($path): void
    {
        if (empty($path)) {
            return;
        }

        foreach ((new Finder)->in($path)->files() as $migration) {

            $namespace = app()->getNamespace();

            $migration = $namespace . str_replace(
                ['/', '.php'],
                ['\\', ''],
                Str::after($migration->getPathname(), realpath(app_path()) . DIRECTORY_SEPARATOR)
            );

            if (
                is_subclass_of($migration, Migration::class) &&
                !(new ReflectionClass($migration))->isAbstract()
            ) {
                app()->make($migration)->up();
            }
        }
    }
}
