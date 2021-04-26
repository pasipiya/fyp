<?php

namespace App\Http\Middleware;

use Closure;

class isAdmin
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
        if(auth()->user()->is_role == 'Super'){
            return $next($request);
        }else{
            return redirect('unauthorizedAccess')->with('delete',"You don't have access.");
        }

    }
}
