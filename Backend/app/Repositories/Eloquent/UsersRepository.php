<?php

namespace App\Repositories\Eloquent;

use App\Models\User;

class UsersRepository
{
    public function findByEmail(string $email)
    {
        return User::where('email', $email)->first();
    }
}