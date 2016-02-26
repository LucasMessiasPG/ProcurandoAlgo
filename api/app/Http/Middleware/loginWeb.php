<?php

namespace App\Http\Middleware;

use Closure;

class LoginWeb
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(\Auth::guard('web')->check()) {
            return $next($request);
        }
        abort(403);
    }
}
