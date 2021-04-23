<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class cekUser
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
            return $next($request);
        }
        //Admin
        elseif (Auth::user()->TIPE_USER == 1) {
            return redirect('admin');
        }
    }
}
