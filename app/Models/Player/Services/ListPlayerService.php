<?php

namespace App\Models\Player\Services;

use App\Models\Player\Repositories\PlayerRepository;
use Illuminate\Http\JsonResponse;

class ListPlayerService
{
    public function execute(): JsonResponse
    {
        $playerRepository = new PlayerRepository();

        $players = $playerRepository->all();

        return response()->json($players);
    }
}
