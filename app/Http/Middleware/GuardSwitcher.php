<?php

namespace App\Http\Middleware;

use Closure;

class GuardSwitcher
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard)
    {
        config([
            'auth.defaults.guard' => $guard
        ]);

        return $next($request);
    }
}
