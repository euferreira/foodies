<?php

namespace App\Http\Contracts\Reservas;

interface IReservaService
{
    public function create(array $data): array;
}
