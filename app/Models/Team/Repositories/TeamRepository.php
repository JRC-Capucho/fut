<?php

namespace App\Models\Team\Repositories;

use App\Models\Team\Entities\Team;
use Illuminate\Support\Collection;

class TeamRepository
{
    public function all(): ?Collection
    {
        return Team::all('name');
    }

    public function create(array $team): ?Team
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

    public function table(string $id): ?Collection
    {
        return Team::select('name', 'points', 'gols', 'matches')->where("league", $id)->orderBy('points', 'desc')->get();
    }
}
