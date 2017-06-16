<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {

        switch ($guard) {
            case 'coordinator':
                //10-05-2017 Lars: Als de guard je actie hebt gechecked en goedgekeurd als 'coördinator', stuur dan de gebruiker naar de route co.dashboard pagina 
                if(Auth::guard($guard)->check())
                    return redirect()->route('Beheer.index');
            break;
                
                //10-05-2017 Lars: Als de guard je actie hebt gechecked en goedgekeurd als user , stuur dan de gebruiker naar de route home pagina 
            default:
                if (Auth::guard($guard)->check()) {
                return redirect('/home');
                }
            break;
        }

        return $next($request);
    }
}
