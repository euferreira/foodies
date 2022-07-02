<?php

namespace App\Http\Services\Token;

use App\Http\Contracts\Token\ITokenRepository;
use App\Http\Contracts\Token\ITokenService;
use InvalidArgumentException;

class TokenService implements ITokenService
{
    protected ITokenRepository $tokenRepository;

    public function __construct(ITokenRepository $tokenRepository)
    {
        $this->tokenRepository = $tokenRepository;
    }

    public function generateToken(array $payload, $expiresIn = 2): string
    {
        if (empty($payload)) {
            throw new InvalidArgumentException('Payload cannot be empty', 400);
        }

        $payload['exp'] = time() + (60 * 60 * 24 * $expiresIn);
        $payload['iat'] = time();

        return $this->tokenRepository->createToken($payload);
    }

    public function validateToken(string $token): bool
    {
        // TODO: Implement validateToken() method.
    }
}
