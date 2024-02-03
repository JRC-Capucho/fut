<?php

namespace App\Models\Team\Entities;

use App\Models\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasUuid;

    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'name',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
