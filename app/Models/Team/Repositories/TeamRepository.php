<?php

namespace App\Models\Team\Repositories;

use App\Models\Team\Entities\Team;

class TeamRepository
{

    public function create(array $team)
    {
        return Team::create($team);
    }

    public function findById(string $id): ?Team
    {
        return Team::find($id);
    }

    public function findByName(string $name): ?Team
    {
        return Team::where('name', $name)->first();
    }
}
