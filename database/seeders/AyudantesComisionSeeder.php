<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AyudantesComisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ayudantes')->insert([
            'id_comision'=>'1',
            'id_ayudante' => '5',
        ]);

        DB::table('ayudantes')->insert([
            'id_comision'=>'1',
            'id_ayudante' => '8',
        ]);

        DB::table('ayudantes')->insert([
            'id_comision'=>'2',
            'id_ayudante' => '4',
        ]);

        DB::table('ayudantes')->insert([
            'id_comision'=>'2',
            'id_ayudante' => '3',
        ]);

        DB::table('ayudantes')->insert([
            'id_comision'=>'3',
            'id_ayudante' => '7',
        ]);

        DB::table('ayudantes')->insert([
            'id_comision'=>'3',
            'id_ayudante' => '10',
        ]);

        DB::table('ayudantes')->insert([
            'id_comision'=>'4',
            'id_ayudante' => '5',
        ]);

        DB::table('ayudantes')->insert([
            'id_comision'=>'4',
            'id_ayudante' => '6',
        ]);
    }
}
