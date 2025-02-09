<?php
namespace App\GraphQL\Middleware;

use Closure;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Http\Request;

class AuthMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Tenta autenticar o usuário com o token JWT
        if (!JWTAuth::parseToken()->authenticate()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // Permite o próximo processo na pipeline
        return $next($request);
    }
}
