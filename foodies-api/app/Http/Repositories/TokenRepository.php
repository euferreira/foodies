<?php

namespace App\Http\Repositories;

use App\Http\Contracts\Token\ITokenRepository;
use Firebase\JWT\JWT;

class TokenRepository implements ITokenRepository
{
    public function getToken(string $token)
    {
        // TODO: Implement getToken() method.
    }

    public function createToken($payload): string
    {
        return JWT::encode($payload, env('JWT_SECRET'), 'HS256');
    }

    public function deleteToken(string $token)
    {
        // TODO: Implement deleteToken() method.
    }
}
