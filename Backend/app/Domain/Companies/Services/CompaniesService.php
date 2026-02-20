<?php

namespace App\Domain\Companies\Services;

use App\Domain\Users\Models\User;

class CompaniesService
{
    public function index()
    {

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

    public function findByUser(User $user)
    {
        return $user->companies()->get();
    }
}