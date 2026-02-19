<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\Eloquent\UsersRepository;


class UsersService
{
    public function __construct(
        private UsersRepository $usersRepository,
    )
    {}

    public function index()
    {
        $this->usersRepository->index();
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