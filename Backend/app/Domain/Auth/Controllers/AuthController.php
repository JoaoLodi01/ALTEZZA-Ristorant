<?php

namespace App\Domain\Users\Controllers;

use App\Helpers\ApiResponse;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Services\AuthService;
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
