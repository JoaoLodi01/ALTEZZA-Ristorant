<?php

namespace App\Repositories\Eloquent;

use App\Models\User;

class UsersRepository
{
    public function index(int $restaurant_id, User $user)
    {
        return User::where('is_active', true)->get();
    }

    public function show(int $user_id)
    {
        return User::where('id' , $user_id)->first();
    }

    public function store(array $data)
    {
        return User::create([

        ]);
    }

    public function update()
    {

    }

    public function delete()
    {

    }

    public function findByEmail(string $email)
    {
        return User::where('email', $email)->first();
    }
}