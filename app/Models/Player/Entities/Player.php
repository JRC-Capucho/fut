<?php

namespace App\Models\Player\Entities;

use App\Models\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasUuid;

    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'name',
        'shirt_number',
        'team'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
