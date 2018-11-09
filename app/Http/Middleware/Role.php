<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Role
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
        if (Auth::user()->role == "re" AND Auth::user()->verified = 1 AND Auth::user()->acc_token = 1){
            return redirect('/regPat');
        }
        if (Auth::user()->role == "admin" AND Auth::user()->verified = 1 AND Auth::user()->acc_token = 1){
            return redirect('/regPat');
        }
        if (Auth::user()->role == "nu" AND Auth::user()->verified = 1 AND Auth::user()->acc_token = 1){
            return redirect('/check');
        }
        if (Auth::user()->role == "doc" AND Auth::user()->verified = 1 AND Auth::user()->acc_token = 1){
            return redirect('/diagnosis');
        }
        if (Auth::user()->role == "tec" AND Auth::user()->verified = 1 AND Auth::user()->acc_token = 1){
            return redirect('/labResults');
        }
        if (Auth::user()->role == "phar" AND Auth::user()->verified == 1 AND Auth::user()->acc_token == 1){
            return redirect('/drugs');
        }
        return $next($request);
    }
}
