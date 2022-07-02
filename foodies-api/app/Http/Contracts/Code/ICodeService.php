<?php

namespace App\Http\Contracts\Code;

interface ICodeService
{
    /**
     * @param int $id
     * @return string
     */
    public function createCode(int $id): string;

    /**
     * @param int $id
     * @param string $code
     * @return bool
     */
    public function validate(int $id, string $code): bool;
}
