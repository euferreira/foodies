<?php

namespace App\Http\Services\Auth;

use App\Http\Contracts\Auth\IAuthRepository;
use App\Http\Contracts\Auth\IAuthService;
use App\Http\Contracts\Cache\ICacheService;
use App\Http\Contracts\Token\ITokenService;
use Illuminate\Support\Facades\Auth;
use function Symfony\Component\String\u;

class AuthService implements IAuthService
{
    protected IAuthRepository $authRepository;
    protected ITokenService $tokenService;
    protected ICacheService $cacheService;

    public function __construct(IAuthRepository $authRepository, ITokenService $tokenService, ICacheService $cacheService)
    {
        $this->authRepository = $authRepository;
        $this->tokenService = $tokenService;
        $this->cacheService = $cacheService;
    }

    private function generatePayload(array $data, array $params): array
    {
        $payload = [
            'id' => $data['id'],
        ];

        $expiresAt = 2;
        $expiresRefreshAt = 3;

        if (array_key_exists('expires', $data) && array_key_exists('expiresRefresh', $params)) {
            $expiresAt          = $params['expires'];
            $expiresRefreshAt   = $params['expiresRefresh'];
        }

        $token = $this->tokenService->generateToken($payload, $expiresAt);
        $refreshToken = $this->tokenService->generateToken($payload, $expiresRefreshAt);

        return [
            'token'         => $token,
            'refreshToken'  => $refreshToken,
        ];
    }

    public function login(array $params): array
    {
        $user = $this->authRepository->login($params);
        return $this->generatePayload($user, $params);
    }

    public function remember(array $params): array
    {
        $params['expires'] = 7;
        $params['expiresRefresh'] = 8;
        $cache = $this->cacheService->get('user:' . $params['email']);
        if (empty($cache)) {
            $user = $this->login($params);
            $this->cacheService->set('user:' . $params['email'], $user['token'], 604800);
        }
        $refreshToken = $this->tokenService->generateToken($params, 8);

        return [
            'token'         => $this->cacheService->get('user:' . $params['email']),
            'refreshToken'  => $refreshToken,
        ];
    }

    public function logout(): array
    {
        $user = Auth::user();
        $result = false;
        if (!empty($user)) {
            $result = $this->cacheService->delete('user:' . $user['email']);
        }

        return [
            'message' => $result ? 'Logout successful' : 'Logout failed',
        ];
    }

    public function loginWithCreatedUser(array $params): array
    {
        $user = $this->authRepository->loginWithCreatedUser($params);
        return $this->generatePayload($user, $params);
    }
}
