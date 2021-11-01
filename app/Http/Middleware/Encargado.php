<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class Encargado
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
        switch(auth::user()->rol){
            case('encargado');
            return $next($request);
            break;

            case('cliente'):
            return redirect('cliente.index');
            break;

            case('contador'):
            return redirect('contador.index');
            break;

            case('supervisor'):
            return redirect('supervisor.index');
            break;
    }
    }
}
