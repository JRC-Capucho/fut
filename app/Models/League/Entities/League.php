<?php

namespace App\Models\League\Entities;

use App\Models\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;

class League extends Model
{
    use HasUuid;

    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'name',
        'start',
        'end',
        'user'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
