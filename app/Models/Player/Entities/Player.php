<?php

namespace App\Models\Player\Entities;

use App\Models\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasUuid;

    protected $primaryKey = 'uuid';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];
}
