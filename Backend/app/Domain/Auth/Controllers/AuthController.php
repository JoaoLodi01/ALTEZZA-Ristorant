<?php

namespace App\Domain\Auth\Controllers;

use App\Domain\Auth\Requests\LoginRequest;
use App\Domain\Auth\Requests\RegisterRequest;
use App\Domain\Auth\Services\AuthService;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;

class AuthController
{    
    use ApiResponse;

    public function __construct(
        private AuthService $authService
    )
    {}

    public function register(RegisterRequest $request)
    {
        $data = $this->authService->register($request->validated());

        return $this->success($data, 'Usuário registrado com sucesso!');
    }

    public function login(LoginRequest $request)
    {
        $data = $this->authService->login($request->validated());
        
        return $this->success($data, 'Login realizado com sucesso!');
    }

    public function logout(Request $request)
    {
        $data = $request->user()->tokens()->delete();

        return $this->success($data, 'Logout realizado com sucesso!');
    }
}
