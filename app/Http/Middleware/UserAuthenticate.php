<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(!Auth::guard('web')->check()){
            return redirect()->route('show-form-login');
        }elseif (Auth::guard('web')->User()->UserStatus == 0) {
            Auth::guard('web')->logout();
            return redirect()->route('show-form-login');
        }


        return $next($request);
    }
}
