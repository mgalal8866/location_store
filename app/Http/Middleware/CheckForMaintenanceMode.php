<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class CheckForMaintenanceMode
{
    protected $except = [
        'up',
    ];
    public function handle(Request $request, Closure $next)
    {

        if($request->is('up*') || $request->is('up')){
            return $next($request);
        }else{
            return new RedirectResponse(url('/maintanance'));
        }
        // return $next($request);
    }
}
