<?php

namespace App\Repositories\Eloquent;

use App\Models\User;

class RestaurantRepository
{
    public function findByUser(int $user_id)
    {
        return User::findOrFail($user_id);
    }
}