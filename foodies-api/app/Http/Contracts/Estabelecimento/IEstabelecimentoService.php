<?php

namespace App\Http\Contracts\Estabelecimento;

interface IEstabelecimentoService
{
    public function getById(int $id): array;
}
