<?php


namespace App\Models\Game\Services;

use App\Exceptions\AppError;
use App\Models\Game\Repositories\GameRepository;
use App\Models\League\Repositories\LeagueRepository;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;

class CreateGameService
{
    public function execute(array $game): JsonResponse
    {
        $newStart = Carbon::createFromFormat("H:i", $game['start']);
        $newEnd = Carbon::createFromFormat("H:i", $game['end']);

        if ($newEnd < $newStart)
            throw new AppError("Hora de término menor que a hora de início.", 422);

        $leagueRepository = new LeagueRepository();

        $league = $leagueRepository->findById($game['league']);

        if (!$league)
            throw new AppError("Liga não existe.", 404);

        if ($game['day'] < $league->start || $game['day'] > $league->end)
            throw new AppError("A data do jogo deve estar entre a data de início e a data de término da liga.", 422);

        $gameRespoitory = new GameRepository();

        $games = $gameRespoitory->findByDay($game['day']);

        if ($games)
            foreach ($games as $existingGame) {
                $start = Carbon::createFromFormat("H:i:s", $existingGame->start);
                $end = Carbon::createFromFormat("H:i:s", $existingGame->end);
                if ($newStart->between($start, $end) || $newEnd->between($start, $end))
                    throw new AppError("A nova partida se sobrepõe a uma partida existente.", 422);
            }

        $game = $gameRespoitory->create($game);

        if (!$game) throw new AppError('Falha no registro.', 500);

        return response()->json(['message' => 'Cadastrado com sucesso!']);
    }
}
