<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        if(in_array('administrador', $guards, true) && Auth::guard('administrador')->check()) {
            return redirect(route('administrador.dashboard'));
        }
        if(in_array('docente', $guards, true) && Auth::guard('docente')->check()) {
            return redirect(route('docente.dashboard'));
        }
        if(in_array('alumno', $guards, true) && Auth::guard('alumno')->check()) {
            return redirect(route('alumno.dashboard'));
        }
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                return redirect(RouteServiceProvider::HOME);
            }
        }

        return $next($request);
    }
}
