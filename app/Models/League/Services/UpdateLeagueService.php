<?php

namespace App\Models\League\Services;

use App\Exceptions\AppError;
use App\Models\League\Repositories\LeagueRepository;
use Illuminate\Http\JsonResponse;

class UpdateLeagueService
{
    public function execute(array $league, string $id): JsonResponse
    {
        $leagueRepository = new LeagueRepository();

        $oldLeague = $leagueRepository->findById($id);

        if (!$oldLeague) throw new AppError('Liga não existe.', 404);

        $leagueExist = $leagueRepository->findByName($league['name']);

        if ($leagueExist && $league['name'] != $oldLeague->name)
            throw new AppError('Liga já existe.', 409);

        $newLeague = $oldLeague->update($league);

        if (!$newLeague) throw new AppError('Falha no registro', 500);

        return response()->json(['message' => 'Atualizado com sucesso!']);
    }
}
