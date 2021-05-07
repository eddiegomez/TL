<?php

namespace App\Http\Middleware;

use Closure;

class IsGestor
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
        if(auth()->check() && $request->user()->tipo === "Gestor") {
            return redirect()->guest('homegdwdestor');
        }
        return $next($request);
    }
}
