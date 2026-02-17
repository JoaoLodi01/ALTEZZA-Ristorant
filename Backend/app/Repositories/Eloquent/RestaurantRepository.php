<?php

namespace App\Repositories\Eloquent;

use App\Models\User;

class RestaurantRepository
{
    public function findByUser(int $user_id)
    {
        return User::findOrFail($user_id);
    }

    public function index(
        
    )
    {

    }

    public function show()
    {

    }

    public function store()
    {

    }

    public function update()
    {

    }

    public function delete()
    {

    }
}