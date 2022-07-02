<?php

namespace App\Http\Contracts\Users;

interface IUsersRepository
{
    public function create(array $data): array;

    public function update(int $id, array $data): int;
}
