<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string[]|null  ...$guards
     * @return mixed
     */
    public function handle($request, Closure $next, ...$guards)
    {

        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
        //    dd(Auth::guard($guard)->check());
        // $auth = Auth::guard('admin');
        // dd($auth->check());

            if (Auth::guard($guard)->check()) {
                dd($guards);
                return redirect(RouteServiceProvider::HOME);
            }

        }


        // if (Auth::guard('admin')->check()) {
        //             return redirect(RouteServiceProvider::HOME);
        // }

        return $next($request);
    }
}
