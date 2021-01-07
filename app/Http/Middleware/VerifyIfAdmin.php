<?php

namespace App\Http\Middleware;

use Closure;

class VerifyIfAdmin
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

        if(auth()->user()->user_type == 'admin'){
            return $next($request);
        }else{
            abort(403, 'You do not access to this module.');
        }


    }
}
