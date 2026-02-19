<?php

namespace App\Repositories\Contracts;

interface UsersRepositoryInterface
{
    public function index();

    public function show(int $id);

    public function store(array $data);

    public function update(int $id, array $data);

    public function delete(int $id);
}