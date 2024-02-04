<?php

namespace App\Models\Game\Services;

use App\Exceptions\AppError;
use App\Models\Game\Repositories\GameRepository;
use App\Models\League\Repositories\LeagueRepository;
use App\Models\Team\Repositories\TeamRepository;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;

class UpdateGameService
{
    public function execute(array $game, string $id): JsonResponse
    {
        $gameRespoitory = new GameRepository();
        $teamRepository = new TeamRepository();

        $finishGame = $gameRespoitory->findById($id);

        if (!$finishGame)
            throw new AppError("Essa partida nao existe.", 404);


        $home_team = $teamRepository->findById($finishGame->home_team);
        $away_team = $teamRepository->findById($finishGame->away_team);

        $finishGame->home_team_scoreboard = $game['home_team_scoreboard'];
        $finishGame->away_team_scoreboard = $game['away_team_scoreboard'];

        $home_team->gols += $game['home_team_scoreboard'];
        $away_team->gols += $game['away_team_scoreboard'];

        if ($finishGame['home_team_scoreboard'] > $game['away_team_scoreboard']) {
            $home_team->points += 3;
            $finishGame->winner = $finishGame->home_team;
        } elseif ($finishGame['home_team_scoreboard'] < $game['away_team_scoreboard']) {
            $away_team->points += 3;
            $finishGame->winner = $finishGame->away_team;
        } else {
            $home_team->points += 1;
            $away_team->points += 1;
        }

        if (!$home_team->save()) throw new AppError('Falha no registro', 500);

        if (!$away_team->save()) throw new AppError('Falha no registro', 500);

        if (!$finishGame->save()) throw new AppError('Falha no registro', 500);

        return response()->json(['message' => 'Atualizado com sucesso!']);
    }
}
