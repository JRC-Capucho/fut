<?php

namespace App\Models\Player\Repositories;

use App\Models\Player\Entities\Player;
use Illuminate\Support\Collection;

class PlayerRepository
{
    public function verifyShirtNumber(array $player): ?Player
    {
        return Player::where("shirt_number", $player['shirt_number'])->where('team', $player['team'])->first();
    }

    public function create(array $player): ?Player
    {
        return Player::create($player);
    }

    public function findById(string $id): ?Player
    {
        return Player::find($id);
    }

    public function all(): ?Collection
    {
        return Player::all('name');
    }

    public function allByTeam(string $id): ?Collection
    {
        return Player::select('name', 'gols')->where('team', $id)->get();
    }
}
