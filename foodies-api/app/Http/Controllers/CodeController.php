<?php

namespace App\Http\Controllers;

use App\Http\Contracts\Code\ICodeService;
use App\Http\Contracts\Users\IUsersService;
use OpenApi\Annotations as OA;

class CodeController
{
    protected ICodeService $service;
    protected IUsersService $usersService;

    public function __construct(ICodeService $service, IUsersService $usersService)
    {
        $this->service = $service;
        $this->usersService = $usersService;
    }

    /**
     * @OA\Patch()
     * @return array
     */
    public function validate(): array
    {
        $isValid = $this->service->validate(auth()->id(), request()->code);

        return $isValid ? $this->usersService->update(
            auth()->id(),
            [
                'ativo' => true,
            ])
            : [
                'success' => false,
                'message' => 'Código inválido!',
            ];
    }
}
