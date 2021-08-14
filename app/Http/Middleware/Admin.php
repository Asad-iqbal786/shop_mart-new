<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
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
        if (Auth::check() && Auth::user()->role==('admin')) {

            return $next($request);
        } else {
            return redirect()->route('login');
        }
    }




    // public function handle(Request $request, Closure $next)
    // {
    //     // dd(auth()->user()->role);
    //     if(auth()->user()->role=='admin'){
    //         return $next($request);
    //     }else{
    //         return redirect()->route(auth()->user()->role)->with('error','You dont have access');

    //     }
    // }
}
