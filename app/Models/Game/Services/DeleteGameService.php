<?php


namespace App\Models\Game\Services;

use App\Exceptions\AppError;
use App\Models\Game\Repositories\GameRepository;
use Illuminate\Http\JsonResponse;

class DeleteGameService
{
    public function execute(string $id): JsonResponse
    {
        $gameRepository = new GameRepository();

        $game = $gameRepository->findById($id);

        if (!$game) throw new AppError('Nao existe essa partida.', 500);

        if (!$game->delete()) throw new AppError('Falha no registro', 500);

        return response()->json(['message' => 'Deletado com sucesso!']);
    }
}
