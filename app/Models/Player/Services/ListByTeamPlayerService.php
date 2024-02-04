<?php

namespace App\Models\Player\Services;

use App\Models\Player\Repositories\PlayerRepository;
use Illuminate\Http\JsonResponse;

class ListByTeamPlayerService
{
    public function execute(string $id): JsonResponse
    {
        $playerRepository = new PlayerRepository();

        $players = $playerRepository->allByTeam($id);

        return response()->json($players);
    }
}
