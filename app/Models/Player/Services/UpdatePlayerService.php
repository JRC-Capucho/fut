<?php

namespace App\Models\Player\Services;

use App\Exceptions\AppError;
use App\Models\Player\Repositories\PlayerRepository;
use Illuminate\Http\JsonResponse;

class UpdatePlayerService
{
    public function execute(array $player, string $id): JsonResponse
    {
        $playerRepository = new PlayerRepository();

        $oldPlayer = $playerRepository->findById($id);

        if (!$oldPlayer) throw new AppError("Jogador não existe.", 404);

        $numberExists = $playerRepository->verifyShirtNumber($player);

        if ($numberExists && $player['shirt_number'] != $oldPlayer->shirt_number)
            throw new AppError("O número da camiseta já está sendo usado.", 409);

        $newPlayer = $oldPlayer->update($player);

        if (!$newPlayer) throw new AppError('Falha no registro', 500);

        return response()->json(['message' => 'Atualizado com sucesso!']);
    }
}
