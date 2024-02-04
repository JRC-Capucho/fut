<?php

namespace App\Http\Controllers\Privates;

use App\Http\Requests\Game\{
    StoreGameRequest,
    UpdateEndGameRequest
};
use App\Models\Game\Services\CreateGameService;
use App\Models\Game\Services\UpdateGameService;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

class GameController extends Controller
{

    public function store(StoreGameRequest $request): JsonResponse
    {
        $createGameService = new CreateGameService();
        return $createGameService->execute($request->validated());
    }

    public function endGame(UpdateEndGameRequest $request, string $id): JsonResponse
    {
        $updateGameService = new UpdateGameService();
        return $updateGameService->execute($request->validated(), $id);
    }
}
