<?php

namespace App\Middleware;

use Closure;
use Genesis\Http\Request;
use Illuminate\Support\Str;

class ChangeName
{
    /**
     * Handle an incoming request.
     *
     * @param \Genesis\Http\Request $request
     * @param \Closure              $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        return $next(Str::title($request . ' rutland'));
    }
}
