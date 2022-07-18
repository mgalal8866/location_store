<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdminMiddleware
{

    public function handle(Request $request, Closure $next)
    {

        // if(!Auth::check()){
        //     // toastr()->error('An error has occurred please try again later.');
        //     return $next($request);
        //     // return redirect()->route('login');
        // }

        if(Auth::user() && Auth::user()->is_admin == 1){

            return $next($request);
        }
        return redirect('/');
         
        // if(Auth::user()->is_admin == 0){
        //     toastr()->success('Data has been saved successfully!');
        //     toastr()->error('An error has occurred please try again later.');
        //     return $next($request);
        // }

        // return redirect()->back();
        // toastr()->success('Data has been saved successfully!');
        // return redirect()->back()->with('unauthorised', 'You are
        //   unauthorised to access this page');
    }
}
