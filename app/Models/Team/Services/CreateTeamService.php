<?php

namespace App\Models\Team\Services;

use App\Exceptions\AppError;
use App\Models\League\Repositories\LeagueRepository;
use App\Models\Team\Repositories\TeamRepository;
use Illuminate\Http\JsonResponse;

class CreateTeamService
{
    public function execute(array $team): JsonResponse
    {
        $leagueRepository = new LeagueRepository();

        $league = $leagueRepository->findById($team['league']);

        if (!$league) throw new AppError('Time já existe.', 409);

        $teamRepository = new TeamRepository();

        $teamExists = $teamRepository->findByName($team['name']);

        if ($teamExists) throw new AppError('Time já existe.', 409);

        $team = $teamRepository->create($team);

        if (!$team) throw new AppError('Falha no registro.', 500);

        return response()->json(['message' => 'Cadastrado com sucesso!']);
    }
}
