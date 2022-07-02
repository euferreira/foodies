<?php

namespace App\Http\Services;

use App\Http\Contracts\Estabelecimento\IEstabelecimentoService;
use App\Http\Contracts\Reservas\IReservaRepository;
use App\Http\Contracts\Reservas\IReservaService;
use Exception;

class ReservaService implements IReservaService
{
    private IReservaRepository $reservaRepository;
    private IEstabelecimentoService $estabelecimentoService;

    public function __construct(
        IReservaRepository $reservaRepository,
        IEstabelecimentoService $estabelecimentoService
    ) {
        $this->reservaRepository = $reservaRepository;
        $this->estabelecimentoService = $estabelecimentoService;
    }

    /**
     * @throws Exception
     */
    public function create(array $data): array
    {
        if ($data['quantidade_pessoas'] <= 0) {
            throw new Exception('Quantidade de pessoas não informada', 400);
        }

        $estabelecimento = $this->estabelecimentoService->getById(1);
        //TODO - Verificar se o estabelecimento está aberto para reserva
        //TODO - Verificar se a data está disponível para o estabelecimento
        //TODO - Verificar se a quantidade de pessoas está disponível para o estabelecimento
        //TODO - Verificar se o horário está disponível para o estabelecimento
        //TODO - Verificar se não existe outra reserva para o estabelecimento na data e horário informado

        $data['usuarios_id'] = auth()->id();
        return $this->reservaRepository->create($data);
    }
}
