<?php

namespace App\Http\Contracts\Auth;

interface IAuthRepository
{
    public function login(array $params): array;

    public function loginWithCreatedUser(array $params);
}
