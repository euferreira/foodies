<?php

namespace App\Http\Contracts\Code;

interface ICodeRepository
{
    public function createCode(int $id): string;

    public function validate(int $id, string $code): bool;
}
