<?php

namespace App\Http\Services;

use App\Http\Contracts\Estabelecimento\IEstabelecimentoRepository;
use App\Http\Contracts\Estabelecimento\IEstabelecimentoService;
use Exception;

class EstabelecimentoService implements IEstabelecimentoService
{
    private IEstabelecimentoRepository $estabelecimentoRepository;

    public function __construct(IEstabelecimentoRepository $estabelecimentoRepository)
    {
        $this->estabelecimentoRepository = $estabelecimentoRepository;
    }

    /**
     * @throws Exception
     */
    public function getById(int $id): array
    {
        $estabelecimento = $this->estabelecimentoRepository->getById($id);

        if (empty($estabelecimento)) {
            throw new Exception('Estabelecimento não encontrado');
        }

        return $estabelecimento;
    }
}
