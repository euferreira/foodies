<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios')->insert([
            'nome'          => 'Administrador',
            'email'         => 'email@example.com',
            'password'      => md5('123456'),
            'telefone'      => '+5511999999999',
            'origem_id'     => 1,
            'created_at'    => new DateTime(),
            'updated_at'    => new DateTime(),
            'ativo'         => true,
        ]);
    }
}
