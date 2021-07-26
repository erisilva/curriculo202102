<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class FormacaosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('formacaos')->insert(['descricao' => 'Ensino Fundamental Completo']);
        DB::table('formacaos')->insert(['descricao' => 'Ensino Médio Completo']);
        DB::table('formacaos')->insert(['descricao' => 'Superior Completo (Graduação)']);
        DB::table('formacaos')->insert(['descricao' => 'Mestrado']);
        DB::table('formacaos')->insert(['descricao' => 'Doutorado']);
    }
}
