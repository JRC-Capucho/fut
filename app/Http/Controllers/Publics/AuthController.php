<?php

namespace App\Http\Controllers\Publics;

use App\Http\Requests\LoginUserRequest;
use App\Models\Auth\Services\AuthorizationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    function __construct()
    {
        $this->middleware(['auth:api', 'VerifyToken'], ['except' => []]);
    }

    public function signIn(LoginUserRequest $request): JsonResponse
    {
        $authorizationService = new AuthorizationService();
        return $authorizationService->execute($request->validated());
    }

    public function signOut()
    {
        JWTAuth::invalidate(
            JWTAuth::parseToken()
        );
        return response()->json(['message' => 'Deslogado com sucesso']);
    }
}
