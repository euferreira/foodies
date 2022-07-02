<?php

namespace App\Http\Services\Users;

use App\Http\Contracts\Auth\IAuthService;
use App\Http\Contracts\Code\ICodeService;
use App\Http\Contracts\Users\IUsersRepository;
use App\Http\Contracts\Users\IUsersService;
use App\Shared\Mail\MailRepository;
use Exception;

class UsersService implements IUsersService
{
    private IUsersRepository $repository;
    private IAuthService $authService;
    private ICodeService $codeService;

    public function __construct(IUsersRepository $repository, IAuthService $authService, ICodeService $codeService)
    {
        $this->repository = $repository;
        $this->authService = $authService;
        $this->codeService = $codeService;
    }

    /**
     * @throws Exception
     */
    public function create(array $params): array
    {
        $params['telefone'] = "+55" . $params['telefone'];
        $params['password'] = md5($params['password']);

        $created = $this->repository->create($params);
        if (!empty($created)) {
            $code = $this->codeService->createCode($created['id']);
            MailRepository::send($params['email'], '<h1>Código de Confirmação</h1>' . $code);
        }
        return $this->authService->loginWithCreatedUser($params);
    }

    public function update(int $id, array $params): array
    {
        $updated = $this->repository->update($id, $params);
        if ($updated > 0) {
            return [
                'success' => true,
                'message' => 'Usuário atualizado com sucesso!',
            ];
        }
        return [
            'success' => false,
            'message' => 'Não foi possível atualizar o usuário!',
        ];
    }
}
