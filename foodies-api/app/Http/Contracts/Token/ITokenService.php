<?php

namespace App\Http\Contracts\Token;

interface ITokenService
{
    public function generateToken(array $payload, $expiresIn = 1): string;

    public function validateToken(string $token): bool;
}
