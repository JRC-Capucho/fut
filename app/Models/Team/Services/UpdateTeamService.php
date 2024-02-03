<?php

namespace App\Models\Team\Services;

use App\Exceptions\AppError;
use App\Models\Team\Repositories\TeamRepository;
use Illuminate\Http\JsonResponse;

class UpdateTeamService
{
    public function execute(array $team, string $id): JsonResponse
    {
        $teamRepository = new TeamRepository();

        $oldTeam = $teamRepository->findById($id);

        if (!$oldTeam) throw new AppError('Time nao existe.', 404);

        $teamExists = $teamRepository->findByName($team['name']);

        if ($teamExists && $team['name'] != $oldTeam->name)
            throw new AppError('Liga já existe', 409);

        $newTeam = $oldTeam->update($team);

        if (!$newTeam) throw new AppError('Falha no registro', 500);

        return response()->json(['message' => 'Atualizado com sucesso!']);
    }
}
