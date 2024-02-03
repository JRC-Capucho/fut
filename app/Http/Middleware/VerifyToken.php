<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Exceptions\HttpResponseException;
use PHPOpenSourceSaver\JWTAuth\Exceptions\JWTException;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class VerifyToken extends Authenticate
{
    protected function unauthenticated($request, array $guards)
    {
        throw new HttpResponseException(response()->json(['error' => 'Unauthorized.'], 401));
    }
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$guards)
    {
        try {
            // Tenta autenticar o usuário com o token JWT
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['error' => 'User not found.'], 404);
            }
            $request->merge(['user' => $user->id]);
        } catch (JWTException $e) {
            // O token é inválido ou expirado
            return response()->json(['error' => 'Token invalid'], 401);
        }

        // O token é válido e o usuário foi autenticado
        return $this->authenticate($request, $guards) ?: $next($request);
    }
}
