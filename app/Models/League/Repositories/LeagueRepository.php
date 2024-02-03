<?php

namespace App\Models\League\Repositories;

use App\Models\League\Entities\League;

class LeagueRepository
{
    public function findById(string $id): ?League
    {
        return League::find($id);
    }

    public function findByName(string $name): ?League
    {
        return League::where('name', $name)->first();
    }

    public function create(array $league): ?League
    {
        return League::create($league);
    }
}
