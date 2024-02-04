<?php

namespace App\Models\Player\Services;

use App\Exceptions\AppError;
use App\Models\Player\Repositories\PlayerRepository;
use Illuminate\Http\JsonResponse;

class UpdateEndGamePlayerService
{
    public function execute(array $game): JsonResponse
    {
        $playerRepository = new PlayerRepository();

        foreach ($game['players'] as $players) {
            $player = $playerRepository->findById($players['id']);
            if (!$player) throw new AppError("Jogador nao existe.", 404);
            $player->gols += $players['gols'];
            $player->save();
        }

        return response()->json(['Atualizado com sucesso']);
    }
}
