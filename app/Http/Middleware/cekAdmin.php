<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class cekAdmin
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
        //User
        if (Auth::user()->TIPE_USER == 2) {
            return redirect('users');
        }
        //Admin
        elseif (Auth::user()->TIPE_USER == 1) {
            return $next($request);
        }
    }
}
