<?php

namespace App\Http\Middleware;

use Closure;

class LoginMiddleware
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
        if($request->session()->has('admin')){
            return $next($request);
        }else{
            session(['back_uri'=>$_SERVER['REQUEST_URI']]);

            return redirect('admin/login');
        }
        
    }
}
