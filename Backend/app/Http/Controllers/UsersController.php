<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Http\Requests\UsersRequest;
use App\Services\UsersService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController
{
    use ApiResponse;

    public function __construct(
        private UsersService $usersService,
    )
    {}

    public function index(int $restaurant_id)
    {
        return $this->usersService->index($restaurant_id, Auth::user());
    }

    public function show(int $restaurant_id)
    {
        return $this->usersService->show($restaurant_id);
    }

    public function store(UsersRequest $request, int $restaurant_id)
    {
        $data = $this->usersService->store($request->validated());

        return $this->success($data, 'Usuário cadastrado com sucesso.');
    }

    public function update(Request $request)
    {
        $data = $this->usersService->update($request->validated());

        return $this->success($data, 'Usuário atualizado com sucesso.');
    }

    public function delete(int $user_id)
    {
        return $this->usersService->delete($user_id);
    }
}
