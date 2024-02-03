<?php

namespace App\Models\Game\Repositories;

use App\Models\Game\Entities\Game;

class GameRepository
{
    public function create(array $user): ?Game
    {
        return Game::create($user);
    }
}
