<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Contador
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
            case('contador'):
            return $next($request);
            break;

            case('cliente'):
            return redirect('cliente.index');
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