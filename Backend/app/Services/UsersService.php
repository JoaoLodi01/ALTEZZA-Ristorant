<?php

namespace App\Services;

use App\Repositories\Eloquent\UsersRepository;
use Illuminate\Support\Facades\Auth;

class UsersService
{
    public function __construct(
        private UsersRepository $usersRepository,
    )
    {}

    public function index(int $restaurant_id)
    {
        $authUser = Auth::user();

        $this->usersRepository->
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