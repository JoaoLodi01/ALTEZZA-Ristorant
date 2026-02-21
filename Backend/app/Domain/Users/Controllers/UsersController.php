<?php

namespace App\Http\Controllers;

use App\Domain\Users\Services\UsersService;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UsersController
{
    public function __construct(
        private UsersService $usersService,
    )
    {}

    public function index()
    {
        $data =  $this->usersService->index();
        return success($data);
    }

    public function show(int $user_id)
    {
        $data = $this->usersService->show($user_id);
        return success($data);
    }

    public function store(StoreUserRequest $request)
    {
        $data = $this->usersService->store($request->validated());

        return success($data, 'Usuário cadastrado com sucesso.');
    }

    public function update(UpdateUserRequest $request, int $user_id)
    {
        $this->usersService->update($this->usersService->show($user_id), $request->validated());
        return success(null, 'Usuário atualizado com sucesso.');
    }

    public function delete(int $user_id)
    {
        $this->usersService->delete($this->usersService->show($user_id));
        return success(null, 'Usuário removido.');
    }
}
