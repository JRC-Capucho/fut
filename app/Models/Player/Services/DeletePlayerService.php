<?php

namespace App\Models\Player\Services;

use App\Exceptions\AppError;
use App\Models\Player\Repositories\PlayerRepository;
use Illuminate\Http\JsonResponse;

class DeletePlayerService
{
    public function execute(string $id): JsonResponse
    {
        $playerRepository = new PlayerRepository();

        $player = $playerRepository->findById($id);

        if (!$player) throw new AppError('Jogador nao existe.', 404);

        if (!$player->delete())
            throw new AppError('Falha no registro', 500);

        return response()->json(['message' => 'Deletado com sucesso!']);
    }
}
