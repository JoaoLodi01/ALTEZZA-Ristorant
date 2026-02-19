<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\Contracts\UsersRepositoryInterface;
use App\Repositories\Eloquent\UsersRepository;


class UsersService
{
    public function __construct(
        private UsersRepositoryInterface $usersRepositoryInterface,
    )
    {}

    public function index()
    {
        $this->usersRepositoryInterface->index();
    }

    public function show()
    {

    }

    public function store()
    {

    }

    public function update()
    {

    }

    public function delete()
    {

    }
}