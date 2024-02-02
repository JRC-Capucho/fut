<?php

namespace App\Models\Player\Service;

use App\Exceptions\AppError;
use App\Models\Player\Entities\Player;
use App\Models\Player\Repositories\PlayerRespository;
use Illuminate\Http\JsonResponse;

class CreatePlayerService
{
    public function execute(array $player): JsonResponse
    {
        $playerRespository = new PlayerRespository();

        $player = Player::create($player);

        if (!$player) throw new AppError('Falha no registro', 500);

        return response()->json(['message' => 'Cadastrado com sucesso!']);
    }
}
