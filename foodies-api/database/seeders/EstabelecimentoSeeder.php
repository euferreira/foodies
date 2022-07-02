<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstabelecimentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estabelecimento')->insert([
            'created_at'   => new DateTime(),
            'updated_at'   => new DateTime(),
            'cnpj'       => '12345678901234',
            'endereco'   => 'Rua Teste',
            'telefone'   => '+5511999999999',
            'razaoSocial' => 'Teste',
            'cep'        => '12345-678',
            'aceitaReserva' => true,
            'quantidadeMaximaReserva' => 10,
        ]);
    }
}
