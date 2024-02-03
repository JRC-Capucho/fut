<?php

namespace App\Models\Team\Services;

use App\Models\Team\Entities\Team;
use Illuminate\Http\JsonResponse;

class ListTeamService
{
    public function execute(): JsonResponse
    {
        $teams = Team::all();
        return response()->json($teams);
    }
}
