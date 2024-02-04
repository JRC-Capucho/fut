<?php

namespace App\Http\Controllers\Privates;

use App\Http\Requests\Game\{
    StoreGameRequest,
    UpdateEndGameRequest,
    UpdateGameRequest
};
use App\Models\Game\Services\{
    CreateGameService,
    UpdateEndGameService,
    UpdateGameService
};

use App\Models\Player\Services\UpdateEndGamePlayerService;
use App\Models\Team\Services\UpdateEndGameTeamService;

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
        $updateEndGamePlayerService = new UpdateEndGamePlayerService();
        $updateEndGameService = new UpdateEndGameService();
        $updateEndGameTeamService = new UpdateEndGameTeamService();

        $finishGame = $updateEndGameService->execute($request->validated(), $id);
        $updateEndGameTeamService->execute($request->validated(), $finishGame);
        return $updateEndGamePlayerService->execute($request->validated());
    }

    public function update(UpdateGameRequest $request, string $id): JsonResponse
    {
        $updateGameService = new UpdateGameService();
        return $updateGameService->execute($request->validated(), $id);
    }
}
