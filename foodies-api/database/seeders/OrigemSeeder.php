<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrigemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $agora = new \DateTime();

        DB::table('origem')->insert([
            'descricao' => 'app',
            'created_at' => $agora,
            'updated_at' => $agora,
        ]);

        DB::table('origem')->insert([
            'descricao' => 'google',
            'created_at' => $agora,
            'updated_at' => $agora,
        ]);

        DB::table('origem')->insert([
            'descricao' => 'facebook',
            'created_at' => $agora,
            'updated_at' => $agora,
        ]);

        DB::table('origem')->insert([
            'descricao' => 'apple',
            'created_at' => $agora,
            'updated_at' => $agora,
        ]);
    }
}
