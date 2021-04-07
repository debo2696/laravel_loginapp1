<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LogCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        print_r(\Session::get('logData'));
        if(empty(\Session::get('logData')))
        {
            return redirect('login'); 
        }
        return $next($request);
    }
}
