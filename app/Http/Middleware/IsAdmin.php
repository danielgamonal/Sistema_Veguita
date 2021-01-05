<?php
//valida que el usuario conectado tenga el rol de Administrador (1)
namespace App\Http\Middleware;

use Closure, Auth;

class IsAdmin
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
        //si el rol de user es 1 (admin)
        //sino lo redirecciona al Home
        if(Auth::user()->role == "1"):
        return $next($request);
    else:
        return redirect('/');
    endif;
    }
}
