<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthenticateMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
         // Verifica se o usuário está autenticado
        if (!Auth::check()) {
            // Se for uma API (JSON esperado)
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'Usuário não autenticado.',
                ], 401);
            }

        }

        return $next($request);
    }
}
