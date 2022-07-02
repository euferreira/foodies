<?php

namespace App\Http\Contracts\Reservas;

interface IReservaRepository
{
    public function create(array $data): array;
}
