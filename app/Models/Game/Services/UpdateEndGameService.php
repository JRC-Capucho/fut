<?php

namespace App\Models\Game\Services;

use App\Exceptions\AppError;
use App\Models\Game\Entities\Game;
use App\Models\Game\Repositories\GameRepository;
use App\Models\Player\Repositories\PlayerRepository;
use Illuminate\Http\JsonResponse;

class UpdateEndGameService
{
    public function execute(array $game, string $id): Game|JsonResponse
    {
        $gameRepository = new GameRepository();

        $finishGame = $gameRepository->findById($id);

        if (!$finishGame)
            throw new AppError("Esta partida não existe.", 404);

        $playerRepository = new PlayerRepository();

        $homeCountGols = 0;
        $awayCountGols = 0;

        foreach ($game['players'] as $players) {
            $player = $playerRepository->findById($players['id']);

            if ($player->team == $finishGame->home_team)
                $homeCountGols += $players['gols'];

            if ($player->team == $finishGame->away_team)
                $homeCountGols += $players['gols'];
        }

        if ($homeCountGols > $game['home_team_scoreboard'])
            throw new AppError('Divergência de gols.', 409);

        if ($awayCountGols > $game['away_team_scoreboard'])
            throw new AppError('Divergencia de gols.', 409);


        $finishGame->home_team_scoreboard = $game['home_team_scoreboard'];
        $finishGame->away_team_scoreboard = $game['away_team_scoreboard'];

        if (!$finishGame->save()) throw new AppError('Falha no registro', 500);

        return $finishGame;
    }
}
