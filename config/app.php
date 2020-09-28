<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Theme URL
    |--------------------------------------------------------------------------
    |
    | This URL is used to properly generate URLs when using for assets and other
    | resources that require a URI to the theme directory.
    |
    */

    'url' => get_template_directory_uri(),

    /*
    |--------------------------------------------------------------------------
    | Ajax URL
    |--------------------------------------------------------------------------
    |
    | This URL is used to send AJAX requests to.
    |
    */

    'ajax' => admin_url('admin-ajax.php'),

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
        /*
         * Genesis Framework Service Providers...
         */


        /*
         * Application Service Providers...
         */
        \App\Providers\AdminServiceProvider::class,
        \App\Providers\AppServiceProvider::class,
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
        'Arr'   => \Illuminate\Support\Arr::class,
        'Auth'  => \Genesis\Support\Facades\Auth::class,
        'File'  => \Genesis\Support\Facades\File::class,
        'Str'   => \Illuminate\Support\Str::class,
        'URL'  => \Genesis\Support\Facades\URL::class,
        'View'  => \Genesis\Support\Facades\View::class,
    ],
];
