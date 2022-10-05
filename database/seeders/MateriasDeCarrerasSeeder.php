<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class materiasDeCarrerasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('materias_de_carreras')->insert([
            'id_carrera'=>'1',
            'id_materia'=>'1'
        ]);

        DB::table('materias_de_carreras')->insert([
            'id_carrera'=>'2',
            'id_materia'=>'1'
        ]);

        DB::table('materias_de_carreras')->insert([
            'id_carrera'=>'3',
            'id_materia'=>'1'
        ]);

        DB::table('materias_de_carreras')->insert([
            'id_carrera'=>'1',
            'id_materia'=>'2'
        ]);

        DB::table('materias_de_carreras')->insert([
            'id_carrera'=>'2',
            'id_materia'=>'2'
        ]);

        DB::table('materias_de_carreras')->insert([
            'id_carrera'=>'3',
            'id_materia'=>'2'
        ]);

        DB::table('materias_de_carreras')->insert([
            'id_carrera'=>'1',
            'id_materia'=>'3'
        ]);

        DB::table('materias_de_carreras')->insert([
            'id_carrera'=>'2',
            'id_materia'=>'3'
        ]);

        DB::table('materias_de_carreras')->insert([
            'id_carrera'=>'3',
            'id_materia'=>'3'
        ]);

        DB::table('materias_de_carreras')->insert([
            'id_carrera'=>'1',
            'id_materia'=>'4'
        ]);

        DB::table('materias_de_carreras')->insert([
            'id_carrera'=>'2',
            'id_materia'=>'4'
        ]);

        DB::table('materias_de_carreras')->insert([
            'id_carrera'=>'3',
            'id_materia'=>'4'
        ]);
    }
}
