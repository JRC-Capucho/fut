<?php

namespace App\Models\Game\Entities;

use App\Models\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasUuid;

    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'day',
        'start',
        'end',
        'home_team_scoreboard',
        'away_team_scoreboard',
        "winner",
        'home_team',
        'away_team',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
