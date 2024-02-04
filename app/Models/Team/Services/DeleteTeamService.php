<?php

namespace App\Models\Team\Services;

use App\Exceptions\AppError;
use App\Models\Team\Repositories\TeamRepository;
use Illuminate\Http\JsonResponse;

class DeleteTeamService
{
    public function execute(string $id): JsonResponse
    {
        $teamRepository = new TeamRepository();

        $team = $teamRepository->findById($id);

        if (!$team) throw new AppError("Não existe o time.", 500);

        if (!$team->delete()) throw new AppError('Falha no registro', 500);

        return response()->json(['message' => 'Deletado com sucesso!']);
    }
}
