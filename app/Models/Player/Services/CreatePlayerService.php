<?php

namespace App\Models\Player\Services;

use App\Exceptions\AppError;
use App\Models\Player\Entities\Player;
use App\Models\Player\Repositories\PlayerRepository;
use Illuminate\Http\JsonResponse;

class CreatePlayerService
{
    public function execute(array $player): JsonResponse
    {
        $playerRepository = new PlayerRepository();

        $player = Player::create($player);

        if (!$player) throw new AppError('Falha no registro', 500);

        return response()->json(['message' => 'Cadastrado com sucesso!']);
    }
}
