<?php

namespace App\Http\Middleware;

use Closure;

class CheckUser
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
        if ( !auth()->check() )
            return redirect()->route('login');
        
        $type = auth()->user()->type;
        
        if($type == 'Mecânico'){
            return redirect()->route('home')->with('error', 'Usuario não autorizado!');
        }
        return $next($request);
    }
}
