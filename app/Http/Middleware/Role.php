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
        if (Auth::user()->role == "re"){
            return redirect('/regPat');
        }
        if (Auth::user()->role == "nu"){
            return redirect('/check');
        }
        if (Auth::user()->role == "doc"){
            return redirect('/diagnosis');
        }
        if (Auth::user()->role == "tec"){
            return redirect('/labResults');
        }
        if (Auth::user()->role == "phar"){
            return redirect('/drugs');
        }
        return $next($request);
    }
}
