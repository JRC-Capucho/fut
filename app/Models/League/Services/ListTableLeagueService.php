<?php

namespace App\Models\League\Services;

use App\Exceptions\AppError;
use App\Models\League\Repositories\LeagueRepository;
use App\Models\Team\Repositories\TeamRepository;
use Illuminate\Http\JsonResponse;

class ListTableLeagueService
{
    public function execute(string $id): JsonResponse
    {
        $leagueRepository = new LeagueRepository();

        $league = $leagueRepository->findById($id);

        if (!$league) throw new AppError('Não existe a liga.', 404);

        $teamRepository = new TeamRepository();

        $table = $teamRepository->table($id);

        return response()->json($table);
    }
}
