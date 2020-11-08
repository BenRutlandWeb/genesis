<?php

namespace App\Http\Middleware;

use Closure;
use Genesis\Http\Request;

class VerifyCsrfToken
{
    /**
     * Handle an incoming request.
     *
     * @param \Genesis\Http\Request $request
     * @param \Closure              $next
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        return $next($request);
    }
}
