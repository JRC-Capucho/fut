<?php

namespace App\Models\User\Repositories;

use App\Models\User\Entities\User;

class UserRepository
{
    public function findByEmail(string $email): ?User
    {
        return User::where('email', $email)->first();
    }
}
