<?php

namespace App\Domain\Users\Services;

use App\Domain\Users\Models\User;

class UsersService
{
    public function index()
    {
        return User::latest()->paginate();
    }

    public function show(int $user_id)
    {
        return User::findOrFail($user_id);
    }

    public function store(array $data)
    {
        return User::create($data);
    }

    public function update(User $user, array $data)
    {
        $user->update($data);

        return $user;
    }

    public function delete(int $user_id)
    {
        User::findOrFail($user_id)->delete();
    }

    public function findByEmail(string $email)
    {
        return User::where('email', $email)->first();
    }
}