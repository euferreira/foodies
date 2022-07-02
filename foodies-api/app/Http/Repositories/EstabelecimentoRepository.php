<?php

namespace App\Http\Repositories;

use App\Http\Contracts\Estabelecimento\IEstabelecimentoRepository;
use App\Models\Estabelecimento;

class EstabelecimentoRepository implements IEstabelecimentoRepository
{

    public function getById(int $id): array
    {
        return Estabelecimento::query()->find($id)->toArray();
    }
}
