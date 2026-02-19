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

    public function index()
    {
        $data =  $this->usersService->index();
        return $this->success($data);
    }

    public function show(int $user_id)
    {
        $data = $this->usersService->show($user_id);
        return $this->success($data);
    }

    public function store(UsersRequest $request)
    {
        $data = $this->usersService->store($request->validated());

        return $this->success($data, 'Usuário cadastrado com sucesso.');
    }

    public function update(Request $request, int $user_id)
    {
        $data = $this->usersService->update($user_id, $request->validated());

        return $this->success($data, 'Usuário atualizado com sucesso.');
    }

    public function delete(int $user_id)
    {
        $this->usersService->delete($user_id);
        return $this->success(null, 'Usuário removido.');
    }
}
