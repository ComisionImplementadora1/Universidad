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
            'id_materia_origen'=>'10',
            'id_materia_correlativa'=>'1'
        ]);

        DB::table('correlativas_fuertes')->insert([
            'id_materia_origen'=>'10',
            'id_materia_correlativa'=>'4'
        ]);

        DB::table('correlativas_fuertes')->insert([
            'id_materia_origen'=>'11',
            'id_materia_correlativa'=>'2'
        ]);

        DB::table('correlativas_fuertes')->insert([
            'id_materia_origen'=>'11',
            'id_materia_correlativa'=>'5'
        ]);

        DB::table('correlativas_fuertes')->insert([
            'id_materia_origen'=>'12',
            'id_materia_correlativa'=>'3'
        ]);

        DB::table('correlativas_fuertes')->insert([
            'id_materia_origen'=>'12',
            'id_materia_correlativa'=>'6'
        ]);
    }
}
