<?php

namespace App\Http\Controllers;

use App\Http\Contracts\Reservas\IReservaService;
use Illuminate\Validation\ValidationException;

class ReservasController extends Controller
{
    private IReservaService $reservaService;

    public function __construct(IReservaService $reservaService)
    {
        $this->reservaService = $reservaService;
    }

    /**
     * @throws ValidationException
     */
    public function create(): array
    {
        $this->validate(request(), [
            'dataHoraReserva' => 'required|date',
            'quantidade_pessoas' => 'required|min:1',
            'local_id' => 'required|min:1',
        ], [
            'dataHoraReserva.required' => 'A data e hora da reserva é obrigatória',
            'dataHoraReserva.date' => 'A data e hora da reserva deve ser uma data válida',
            'quantidade_pessoas.required' => 'A quantidade de pessoas é obrigatória',
            'quantidade_pessoas.min' => 'A quantidade de pessoas deve ser maior que 0',
            'local_id.required' => 'O local é obrigatório',
            'local_id.min' => 'O local deve ser maior que 0',
        ]);

        return $this->reservaService->create(request()->all());
    }
}
