<?php

namespace App\Http\Middleware;

use Closure;
use Genesis\Http\Request;

class Authenticate
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
        if (is_user_logged_in()) {
            return $next($request);
        }
        abort(403, 'Not logged in.');
    }
}
