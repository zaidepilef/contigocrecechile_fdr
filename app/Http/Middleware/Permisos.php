<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class Permisos
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
        if (Session::has('username')) {
            return $next($request);
        }else{
            return redirect('/log_in');
        }
    }
}
