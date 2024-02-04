<?php

namespace App\Models\Team\Services;

use App\Exceptions\AppError;
use App\Models\Team\Repositories\TeamRepository;
use Illuminate\Http\JsonResponse;

class UpdateEndGameTeamService
{
    public function execute(array $game, object $finishGame): bool | JsonResponse
    {
        $teamRepository = new TeamRepository();

        $home_team = $teamRepository->findById($finishGame->home_team);
        $away_team = $teamRepository->findById($finishGame->away_team);

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

        $home_team->matches += 1;
        $away_team->matches += 1;


        if (!$finishGame->save()) throw new AppError('Falha no registro', 500);

        if (!$home_team->save()) throw new AppError('Falha no registro', 500);

        if (!$away_team->save()) throw new AppError('Falha no registro', 500);

        return true;
    }
}
