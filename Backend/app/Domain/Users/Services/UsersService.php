<?php

namespace App\Domain\Users\Services;

use App\Domain\Users\Models\User;

class UsersService
{
    public function index()
    {
        return User::paginate(10);
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
        return $user->update($data);
    }

    public function delete(User $user)
    {
        return $user->update([
            'is_active' => false,
        ]);
    }

    public function findByEmail(string $email)
    {
        return User::where('email', $email)->first();
    }
}