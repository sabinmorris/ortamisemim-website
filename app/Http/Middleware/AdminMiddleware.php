<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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

        if (Auth::check()) {
            
            if (Auth::user()->role == 'admin' || 'writer' || 'editor') {

                return $next($request);
            }else{
                return redirect('/admin-dashboard')->with('message','Access Dinied you are not authorized user');
            }
        }else{
            return redirect()->back()->with('message', 'Please Login First');
        }
        //return $next($request);
        
    }
}
