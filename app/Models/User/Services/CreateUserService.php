<?php


namespace App\Models\User\Services;

use App\Exceptions\AppError;
use App\Models\User\Entities\User;
use App\Models\User\Repositories\UserRepository;
use Illuminate\Http\JsonResponse;

class CreateUserService
{
    public function execute(array $user): JsonResponse
    {
        $userRespository = new UserRepository();

        $emailExists = $userRespository->findByEmail($user['email']);

        if ($emailExists) throw new AppError('Email ja existe', 409);

        $user = $userRespository->create($user);

        if (!$user) throw new AppError('Falha no registro', 500);

        return response()->json(['message' => 'Cadastrado com sucesso!']);
    }
}
