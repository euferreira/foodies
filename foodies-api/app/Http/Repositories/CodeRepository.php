<?php

namespace App\Http\Repositories;

use App\Http\Contracts\Cache\ICacheService;
use App\Http\Contracts\Code\ICodeRepository;
use App\Http\Contracts\Users\IUsersService;
use Illuminate\Support\Str;

class CodeRepository implements ICodeRepository
{
    private ICacheService $cacheService;

    public function __construct(ICacheService $cacheService)
    {
        $this->cacheService = $cacheService;
    }

    private function setKey(int $id, $code): string
    {
        return 'id_' . $id . '_' . 'code_' . strtoupper($code);
    }

    public function createCode(int $id): string
    {
        $code = Str::random(4);
        $exists = $this->cacheService->get($code);
        if (is_null($exists)) {
            $this->cacheService->set($this->setKey($id, $code), strtoupper($code));
            return strtoupper($code);
        } else {
            return $this->createCode();
        }
    }

    public function validate(int $id, string $code): bool
    {
        $exists = $this->cacheService->get($this->setKey($id, $code));
        if (is_null($exists)) {
            return false;
        }
        else {
            $this->cacheService->delete($this->setKey($id, $code));
            return true;
        }
    }
}
