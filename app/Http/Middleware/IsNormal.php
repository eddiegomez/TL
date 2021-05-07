<?php

namespace App\Http\Middleware;

use Closure;

class IsNormal
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
        if(auth()->check() && $request->user()->tipo === "Normal") {
            return redirect()->guest('homenodrmal');
        }
        return $next($request);

    }
}
