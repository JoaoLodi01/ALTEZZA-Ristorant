<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\Contracts\UsersRepositoryInterface;

class UsersRepository implements UsersRepositoryInterface
{
    public function index()
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

    public function update(int $id, array $data)
    {

    }

    public function delete(int $id)
    {

    }

    public function findByEmail(string $email)
    {
        return User::where('email', $email)->first();
    }
}