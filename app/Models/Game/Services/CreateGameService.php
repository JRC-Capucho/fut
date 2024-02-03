<?php


namespace App\Models\Game\Services;

use App\Models\Game\Repositories\GameRepository;
use App\Models\League\Repositories\LeagueRepository;

class CreateGameService
{
    public function execute(array $game)
    {
        $leagueRepository = new LeagueRepository();
        $league = $leagueRepository->findById($game['league']);
        dd($league);
        $gameRespoitory = new GameRepository();

        $game = $gameRespoitory->create($game);
    }
}
