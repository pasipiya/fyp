<?php

namespace App\Http\Middleware;

use Closure;

class isClient
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
        if(auth()->user()->user_type == 'Client' && auth()->user()->is_role == 'Owner'){
            return $next($request);
        }else{
            return redirect('unauthorizedAccess')->with('delete',"You don't have access.");
        }
    }
}
