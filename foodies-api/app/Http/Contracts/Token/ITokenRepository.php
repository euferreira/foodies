<?php

namespace App\Http\Contracts\Token;

interface ITokenRepository
{
    public function getToken(string $token);
    public function createToken(array $payload): string;
    public function deleteToken(string $token);
}
