<?php

namespace App\Http\Controllers\Privates;

use App\Exceptions\AppError;
use App\Http\Requests\League\{
    StoreLeagueRequest,
    UpdateLeagueRequest
};

use App\Models\League\Services\{
    CreateLeagueService,
    ListTableLeagueService,
    UpdateLeagueService
};
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

class LeagueController extends Controller
{
    public function index(string $id): JsonResponse
    {
        $listTableLeagueService = new ListTableLeagueService();
        return $listTableLeagueService->execute($id);
    }

    public function store(StoreLeagueRequest $request): JsonResponse
    {
        $createLeagueService = new CreateLeagueService();
        return $createLeagueService->execute($request->validated());
    }

    public function update(UpdateLeagueRequest $request, string $id): JsonResponse
    {
        $updateLeagueService = new UpdateLeagueService();
        return $updateLeagueService->execute($request->validated(), $id);
    }
}
