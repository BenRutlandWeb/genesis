<?php

namespace App\Http\Middleware;

use Genesis\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs and AJAX actions that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [];
}
