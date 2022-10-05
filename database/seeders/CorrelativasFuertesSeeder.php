<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CorrelativasFuertesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('correlativas_fuertes')->insert([
            'id_materia_origen'=>'4',
            'id_materia_correlativa'=>'1'
        ]);

        DB::table('correlativas_fuertes')->insert([
            'id_materia_origen'=>'4',
            'id_materia_correlativa'=>'2'
        ]);
    }
}
