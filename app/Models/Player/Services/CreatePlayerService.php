<?php

namespace App\Models\Player\Services;

use App\Exceptions\AppError;
use App\Models\Player\Repositories\PlayerRepository;
use App\Models\Team\Repositories\TeamRepository;
use Illuminate\Http\JsonResponse;

class CreatePlayerService
{
    public function execute(array $player): JsonResponse
    {
        $playerRepository = new PlayerRepository();

        $teamRepository = new TeamRepository();

        $team = $teamRepository->findById($player['team']);

        if (!$team) throw new AppError('Time nao registro', 404);

        $numberExists = $playerRepository->verifyShirtNumber($player);

        if ($numberExists) throw new AppError('O numero da camiseta ja esta sendo usado', 409);

        $player = $playerRepository->create($player);

        if (!$player) throw new AppError('Falha no registro', 500);

        return response()->json(['message' => 'Cadastrado com sucesso!']);
    }
}
