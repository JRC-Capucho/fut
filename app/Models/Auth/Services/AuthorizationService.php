<?php

namespace App\Models\Auth\Services;

use App\Exceptions\AppError;
use App\Models\User\Repositories\UserRepository;
use Illuminate\Http\JsonResponse;

class AuthorizationService
{
    public function execute(array $user): JsonResponse
    {

        if (!$token = auth()->attempt($user))
            throw new AppError('Senha ou email inválido.', 400);

        $userRepository = new UserRepository();

        $user = $userRepository->findByEmail($user['email']);

        return response()->json([
            'user' => $user,
            'authorization' => [
                'token' => $token,
                'type' => 'Bearer'
            ]
        ]);
    }
}
