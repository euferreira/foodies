<?php

namespace App\Http\Repositories;

use App\Http\Contracts\Auth\IAuthRepository;
use App\Models\User;
use Exception;

class AuthRepository implements IAuthRepository
{
    /**
     * @param array $params
     * @return array
     * @throws Exception
     */
    public function login(array $params): array
    {
        $user = User::where('email', $params['email'])
            ->where('password', md5($params['password']))
            ->where('ativo', 1)
            ->get()
            ->first();

        if (empty($user)) {
            throw new Exception('Usuário não encontrado.', 204);
        }

        return $user->toArray();
    }

    /**
     * @throws Exception
     */
    public function loginWithCreatedUser(array $params)
    {
        $user = User::where('email', $params['email'])
            ->where('password', $params['password'])
            ->get()
            ->first();

        if (empty($user)) {
            throw new Exception('Usuário não encontrado.', 204);
        }

        return $user->toArray();
    }
}
