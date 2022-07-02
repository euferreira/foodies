<?php

namespace App\Http\Contracts\Estabelecimento;

interface IEstabelecimentoRepository
{
    public function getById(int $id): array;
}
