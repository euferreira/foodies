<?php

namespace App\Http\Contracts\Users;

interface IUsersService
{
    public function create(array $params): array;

    public function update(int $id, array $params): array;
}
