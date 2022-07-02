<?php

namespace App\Http\Contracts\Auth;

interface IAuthService
{
    public function login(array $params): array;

    public function loginWithCreatedUser(array $params): array;

    public function remember(array $params): array;

    public function logout(): array;
}
