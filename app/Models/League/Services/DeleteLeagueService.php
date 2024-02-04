<?php

namespace App\Models\League\Services;

use App\Exceptions\AppError;
use App\Models\League\Repositories\LeagueRepository;
use Illuminate\Http\JsonResponse;

class DeleteLeagueService
{
    public function execute(string $id): JsonResponse
    {
        $leagueRepository = new LeagueRepository();

        $league = $leagueRepository->findById($id);

        if (!$league) throw new AppError('Nao existe a liga.', 500);

        if (!$league->delete()) throw new AppError('Falha no registro', 500);

        return response()->json(['message' => 'Deletado com sucesso!']);
    }
}
