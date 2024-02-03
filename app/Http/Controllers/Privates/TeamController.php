<?php

namespace App\Http\Controllers\Privates;

use App\Http\Requests\Team\{StoreTeamRequest, UpdateTeamRequest};
use App\Models\Team\Services\{CreateTeamService, ListTeamService, UpdateTeamService};
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

class TeamController extends Controller
{
    public function store(StoreTeamRequest $request): JsonResponse
    {
        $createTeamService = new CreateTeamService();
        return $createTeamService->execute($request->validated());
    }

    public function index(): JsonResponse
    {
        $listTeamService = new ListTeamService();
        return $listTeamService->execute();
    }

    public function update(UpdateTeamRequest $request, string $id): JsonResponse
    {
        $updateTeamService = new UpdateTeamService();
        return $updateTeamService->execute($request->validated(), $id);
    }
}
