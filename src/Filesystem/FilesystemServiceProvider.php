<?php

namespace Genesis\Filesystem;

use Genesis\Support\ServiceProvider;

class FilesystemServiceProvider extends ServiceProvider
{
    /**
     * Register the filesystem.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->singleton('files', function () {
            return new \Genesis\Filesystem\Filesystem();
        });
    }
}
