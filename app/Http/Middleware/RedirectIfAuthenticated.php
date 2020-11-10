<?php

namespace App\Http\Middleware;

use Closure;
use Genesis\Http\Request;

class RedirectIfAuthenticated
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
        if (!is_user_logged_in()) {
            return $next($request);
        }
        return url()->redirect('/');
    }
}
