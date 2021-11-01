<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Cliente
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
            case('cliente');
            return $next($request);
            break;

            case('contador'):
            return redirect('contador.index');
            break;

            case('supervisor'):
            return redirect('supervisor.index');
            break;

            case('Encargado'):
            return redirect('encargado.index');
            break;
        }
    }
}
