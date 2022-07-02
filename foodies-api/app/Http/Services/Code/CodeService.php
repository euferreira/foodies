<?php

namespace App\Http\Services\Code;

use App\Http\Contracts\Code\ICodeRepository;
use App\Http\Contracts\Code\ICodeService;
use App\Http\Contracts\Users\IUsersService;

class CodeService implements ICodeService
{
    private ICodeRepository $repository;

    public function __construct(ICodeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function createCode(int $id): string
    {
        return $this->repository->createCode($id);
    }

    public function validate(int $id, string $code): bool
    {
        return $this->repository->validate($id, $code);
    }
}
