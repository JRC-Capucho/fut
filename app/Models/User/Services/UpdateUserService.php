<?php

namespace App\Models\User\Services;

use App\Exceptions\AppError;
use App\Models\User\Repositories\UserRepository;
use Illuminate\Http\JsonResponse;

class UpdateUserService
{
    public function execute(array $user): JsonResponse
    {
        $userRepository = new UserRepository();

        $oldUser = $userRepository->findByEmail($user['email']);

        if (!$oldUser) throw new AppError("Usuário não encontrado.", 404);

        $newUser = $oldUser->update($user);

        if (!$newUser) throw new AppError('Falha no registro', 500);

        return response()->json(['message' => 'Atualizado com sucesso!']);
    }
}
