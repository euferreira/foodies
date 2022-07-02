<?php

namespace App\Http\Repositories;

use App\Http\Contracts\Reservas\IReservaRepository;
use App\Models\Reservas;

class ReservaRepository implements IReservaRepository
{

    public function create(array $data): array
    {
        $created = Reservas::create($data);
        return $created->toArray();
    }
}
