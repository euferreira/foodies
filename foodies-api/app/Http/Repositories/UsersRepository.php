<?php

namespace App\Http\Repositories;

use App\Http\Contracts\Cache\ICacheService;
use App\Http\Contracts\Token\ITokenService;
use App\Http\Contracts\Users\IUsersRepository;
use App\Models\User;
use Exception;
use Illuminate\Support\Str;

class UsersRepository implements IUsersRepository
{
    /**
     * @throws Exception
     */
    public function create(array $data): array
    {
        try {
            $created = User::create($data);
            return $created->toArray();
        }
        catch (Exception $e) {
            if ($e->getCode() == 23000) {
                throw new Exception('Usuário já cadastrado!', 400);
            }
            else {
                throw $e;
            }
        }
    }

    public function update(int $id, array $data): int
    {
        return User::where('id', $id)->update($data);
    }
}
