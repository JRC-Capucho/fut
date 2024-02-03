<?php

namespace App\Models\Team\Services;

use App\Exceptions\AppError;
use App\Models\Team\Repositories\TeamRepository;
use Illuminate\Http\JsonResponse;

class CreateTeamService
{
    public function execute(array $team): JsonResponse
    {
        $teamRepository = new TeamRepository();

        $nameExists = $teamRepository->findByName($team['name']);

        if ($nameExists) throw new AppError('Nome já existe', 409);

        $team = $teamRepository->create($team);

        if (!$team) throw new AppError('Falha no registro', 500);

        return response()->json(['message' => 'Cadastrado com sucesso!']);
    }
}
