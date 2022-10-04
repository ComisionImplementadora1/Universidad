<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MateriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('materias')->insert([
            'codigo'=>'5912',
            'nombre' => 'Elementos de Algebra y Geometría',
            'id_carrera' => '1'
        ]);

        DB::table('materias')->insert([
            'codigo'=>'5912',
            'nombre' => 'Elementos de Algebra y Geometría',
            'id_carrera' => '2'
        ]);

        DB::table('materias')->insert([
            'codigo'=>'5912',
            'nombre' => 'Elementos de Algebra y Geometría',
            'id_carrera' => '3'
        ]);

        DB::table('materias')->insert([
            'codigo'=>'5793',
            'nombre' => 'Resolución de problemas y algoritmos',
            'id_carrera' => '1'
        ]);

        DB::table('materias')->insert([
            'codigo'=>'5793',
            'nombre' => 'Resolución de problemas y algoritmos',
            'id_carrera' => '2'
        ]);

        DB::table('materias')->insert([
            'codigo'=>'5793',
            'nombre' => 'Resolución de problemas y algoritmos',
            'id_carrera' => '3'
        ]);

        DB::table('materias')->insert([
            'codigo'=>'5551',
            'nombre' => 'Análisis Matemático I',
            'id_carrera' => '1'
        ]);

        DB::table('materias')->insert([
            'codigo'=>'5551',
            'nombre' => 'Análisis Matemático I',
            'id_carrera' => '2'
        ]);

        DB::table('materias')->insert([
            'codigo'=>'5551',
            'nombre' => 'Análisis Matemático I',
            'id_carrera' => '3'
        ]);

        DB::table('materias')->insert([
            'codigo'=>'7713',
            'nombre' => 'Introducción a la Programación Orientada a Objetos',
            'id_carrera' => '1'
        ]);

        DB::table('materias')->insert([
            'codigo'=>'7713',
            'nombre' => 'Introducción a la Programación Orientada a Objetos',
            'id_carrera' => '2'
        ]);

        DB::table('materias')->insert([
            'codigo'=>'7713',
            'nombre' => 'Introducción a la Programación Orientada a Objetos',
            'id_carrera' => '3'
        ]);
    }
}
