<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $role) : Response
    {
        if (!Auth::check()) {
            // Se o usuário não está logado
            return redirect('login');
        }

        $user = Auth::user();

        if ($user->role !== $role && $user->role !== 'admin') {
            // Se o usuário não tem a função necessária e não é admin, redirecionar para home
            return redirect('home');
        }
        return $next($request);
    }
    
}
