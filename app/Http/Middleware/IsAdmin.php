<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        // Se não estiver autenticado ou não for admin, redireciona
        if (!auth()->check() || !auth()->user()->is_admin) {
            return redirect('/')
                ->with('error', 'Acesso não autorizado.');
        }

        // Se for admin, continua normalmente
        return $next($request);
    }
}
