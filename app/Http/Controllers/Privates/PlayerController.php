<?php

namespace App\Http\Controllers\Privates;

use App\Http\Requests\Player\StorePlayerRequest;
use App\Http\Requests\Player\UpdatePlayerRequest;
use App\Models\Player\Services\CreatePlayerService;
use App\Models\Player\Services\DeletePlayerService;
use App\Models\Player\Services\ListByTeamPlayerService;
use App\Models\Player\Services\ListPlayerService;
use App\Models\Player\Services\UpdatePlayerService;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

class PlayerController extends Controller
{
    public function index(): JsonResponse
    {
        $listPlayerService = new ListPlayerService();
        return $listPlayerService->execute();
    }

    public function listByTeam(string $id): JsonResponse
    {
        $listByTeamPlayerService = new ListByTeamPlayerService();
        return $listByTeamPlayerService->execute($id);
    }

    public function store(StorePlayerRequest $request): JsonResponse
    {
        $createPlayerService = new CreatePlayerService();
        return $createPlayerService->execute($request->validated());
    }

    public function update(UpdatePlayerRequest $request, string $id): JsonResponse
    {
        $updatePlayerService = new UpdatePlayerService();
        return $updatePlayerService->execute($request->validated(), $id);
    }

    public function delete(string $id): JsonResponse
    {
        $deletePlayerService = new DeletePlayerService();
        return $deletePlayerService->execute($id);
    }
}
