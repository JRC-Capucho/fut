<?php

namespace App\Models\League\Services;

use App\Exceptions\AppError;
use App\Models\League\Repositories\LeagueRepository;
use Illuminate\Http\JsonResponse;

class CreateLeagueService
{
    public function execute(array $league): JsonResponse
    {
        $leagueRepository = new LeagueRepository();

        $nameExists =  $leagueRepository->findByName($league['name']);

        if ($nameExists) throw new AppError('Nome ja existe', 409);

        $league = $leagueRepository->create($league);

        if (!$league) throw new AppError('Falha no registro', 500);

        return response()->json(['message' => 'Cadastrado com sucesso!']);
    }
}
