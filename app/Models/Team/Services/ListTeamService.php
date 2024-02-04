<?php

namespace App\Models\Team\Services;

use App\Models\Team\Entities\Team;
use App\Models\Team\Repositories\TeamRepository;
use Illuminate\Http\JsonResponse;

class ListTeamService
{
    public function execute(): JsonResponse
    {
        $teamRepository = new TeamRepository();
        $teams = $teamRepository->all();
        return response()->json($teams);
    }
}
