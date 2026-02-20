<?php

namespace App\Domain\Auth\Services;

use App\Domain\Companies\Services\CompaniesService;
use App\Domain\Users\Services\UsersService;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthService
{
    public function __construct(
        private UsersService $usersService,
        private CompaniesService $companiesService,
    )
    {}

    public function register(array $data)
    {
        if ($this->usersService->findByEmail($data['email'])) {
            throw new Exception('Email já cadastrado.');
        }

        $data['email'] = strtolower($data['email']);
        $data['password'] = Hash::make($data['password']);
        $data['confirm_password'] = Hash::make($data['confirm_password']);

        return $this->usersService->store([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'confirm_password' => $data['confirm_password']
        ]);
    }


    public function login(array $data): array
    {
        $user = $this->usersService->findByEmail($data['email']);
        
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
                
        $companies = $this->companiesService->findByUser($user->id);
        $token = $user->createToken('auth_token')->plainTextToken;

        return [
            'user' => $user,
            'token' => $token,
            'restaurants' => $companies,
        ];
    }

}