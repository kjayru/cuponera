<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $uri = $request->session()->get('_previous')['url'];
        
        $request->session()->put('url_primary', $uri);
        
        if (Auth::guard($guard)->check()) {
            return redirect($uri);
        }

        return $next($request);
    }
}
