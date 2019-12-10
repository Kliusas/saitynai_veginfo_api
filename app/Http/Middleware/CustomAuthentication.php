<?php

namespace App\Http\Middleware;

class CustomAuthentication
{
    /**
     * Handle an incoming request.
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     * @return mixed
     */
    public function handle($request, \Closure $next)
    {
        if ($request->ajax() || strlen($request->cookie('auth')) > 15) {
            return $next($request);
            
        }
        return \Illuminate\Support\Facades\Redirect::to("http://localhost:8081/login");
        
    }
}
