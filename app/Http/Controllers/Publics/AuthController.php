<?php

namespace App\Http\Controllers\Publics;

use App\Http\Requests\Auth\LoginUserRequest;
use App\Models\Auth\Services\AuthorizationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function signIn(LoginUserRequest $request): JsonResponse
    {
        $authorizationService = new AuthorizationService();
        return $authorizationService->execute($request->validated());
    }

    public function signOut()
    {
        Auth::logout();

        return response()->json(['message' => 'Deslogado com sucesso']);
    }
}
