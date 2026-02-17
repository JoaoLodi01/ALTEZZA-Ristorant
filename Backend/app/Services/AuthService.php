<?php

namespace App\Services;

use App\Repositories\Eloquent\RestaurantRepository;
use App\Repositories\Eloquent\UsersRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthService
{
    public function __construct(
        private UsersRepository $usersRepository,
        private RestaurantRepository $restaurantRepository,
    )
    {}

    

    public function login(array $data): array
    {
        $user = $this->usersRepository->findByEmail($data['email']);
        $restaurants = $this->restaurantRepository->findByUser($user->id);

        if (!$user || !Hash::check($data['password'], $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['Credenciais inválidas']
            ]);
        }

        if (!$user->is_active) {
            throw ValidationException::withMessages([
                'email' => ['Usuário inativo']
            ]);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return [
            'user' => $user,
            'token' => $token,
            'restaurants' => $restaurants,
        ];
    }

}