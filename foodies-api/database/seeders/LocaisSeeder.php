<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocaisSeeder extends Seeder
{
    public function run()
    {
        DB::table('locais')->insert([
            'descricao'     => 'Interior',
            'created_at'    => new DateTime(),
            'updated_at'    => new DateTime(),
        ]);
        DB::table('locais')->insert([
            'descricao'     => 'Exterior',
            'created_at'    => new DateTime(),
            'updated_at'    => new DateTime(),
        ]);
    }

}
