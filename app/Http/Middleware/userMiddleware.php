<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class userMiddleware
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
        if(Auth::user()->email_verified_at!=null)
        {
            
            
            if(Auth::user()->role==null)
            {
                
                return $next($request);
            }
            else
            {
                
                return redirect('email/verify');
            }
        }    
        else
            {
                
                return redirect('email/verify');
            }

    }
}
