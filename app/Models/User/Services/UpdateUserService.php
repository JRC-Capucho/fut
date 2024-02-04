<?php

namespace App\Models\User\Services;

use App\Exceptions\AppError;
use App\Models\User\Repositories\UserRepository;
use Illuminate\Http\JsonResponse;

class UpdateUserService
{
    public function execute(array $user, string $email): JsonResponse
    {
        $userRepository = new UserRepository();
        $oldUser = $userRepository->findByEmail($email);

        if (!$oldUser) throw new AppError("Nao existe usuario.", 404);

        $newUser = $oldUser->update($user);

        if (!$newUser) throw new AppError('Falha no registro', 500);

        return response()->json(['message' => 'Cadastrado com sucesso!']);
    }
}
