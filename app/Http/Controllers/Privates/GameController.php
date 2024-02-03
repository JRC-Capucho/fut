<?php

namespace App\Http\Controllers\Publics;

use App\Http\Requests\Game\StoreGameRequest;
use App\Models\Game\Services\CreateGameService;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

class GameController extends Controller
{

    public function store(StoreGameRequest $request): JsonResponse
    {
        $createGameService = new CreateGameService();
        return $createGameService->execute($request->validated());
    }
}
