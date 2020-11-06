<?php

global $wpdb;

return [

    /*
    |--------------------------------------------------------------------------
    | Database Connection
    |--------------------------------------------------------------------------
    |
    | Here we set the database connection for your application. This defaults to
    | the WordPress connection details.
    |
    */

    'db' => [
        'driver'    => 'mysql',
        'prefix'    => $wpdb->prefix,
        'host'      => DB_HOST,
        'database'  => DB_NAME,
        'username'  => DB_USER,
        'password'  => DB_PASSWORD,
        'port'      => '3306',
        'charset'   => 'utf8',
        'collation' => 'utf8_unicode_ci',
    ],

    /*
    |--------------------------------------------------------------------------
    | Migration Repository Table
    |--------------------------------------------------------------------------
    |
    | This table keeps track of all the migrations that have already run for
    | your application. Using this information, we can determine which of
    | the migrations on disk haven't actually been run in the database.
    |
    */

    'migrations' => 'migrations',

    /*
    |--------------------------------------------------------------------------
    | Autoloaded Service Providers
    |--------------------------------------------------------------------------
    |
    | The service providers listed here will be automatically loaded on the
    | request to your application. Feel free to add your own services to
    | this array to grant expanded functionality to your applications.
    |
    */

    'providers' => [
        \App\Providers\EventServiceProvider::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Class Aliases
    |--------------------------------------------------------------------------
    |
    | This array of class aliases will be registered when this application
    | is started. However, feel free to register as many as you wish as
    | the aliases are "lazy" loaded so they don't hinder performance.
    |
    */

    'aliases' => [
        'Arr'     => \Illuminate\Support\Arr::class,
        'Ajax'    => \Genesis\Support\Facades\Ajax::class,
        'Auth'    => \Genesis\Support\Facades\Auth::class,
        'Console' => \Genesis\Support\Facades\Console::class,
        'DB'      => \Genesis\Support\Facades\DB::class,
        'Event'   => \Genesis\Support\Facades\Event::class,
        'File'    => \Genesis\Support\Facades\File::class,
        'Mail'    => \Genesis\Support\Facades\Mail::class,
        'Request' => \Genesis\Support\Facades\Request::class,
        'Route'   => \Genesis\Support\Facades\Route::class,
        'Str'     => \Illuminate\Support\Str::class,
        'URL'     => \Genesis\Support\Facades\URL::class,
        'View'    => \Genesis\Support\Facades\View::class,
    ],
];
