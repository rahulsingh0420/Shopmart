<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(isset(Auth::user()->id)){
        if(Auth::user()->actype == "admin"){
            return $next($request);
        }else{
            return redirect()->back();
        }
        }else{
            return redirect('/login')->with('loggedout', "Login First");
               }
    }
}
