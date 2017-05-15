<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\support\Facades\Auth;
class RedirectIfNotAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard='admin')
    {
        if(Auth :: guard()->guest()){
            return redirect()-> guest('admin/login');

        }
        return $next($request);
    }
}
