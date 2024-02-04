<?php

namespace App\Models\Game\Repositories;

use App\Models\Game\Entities\Game;
use Illuminate\Support\Collection;

class GameRepository
{
    public function create(array $user): ?Game
    {
        return Game::create($user);
    }

    public function findByDay(string $date): ?Collection
    {
        return Game::where('day', $date)->get();
    }
}
