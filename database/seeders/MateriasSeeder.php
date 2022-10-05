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
        ]);

        DB::table('materias')->insert([
            'codigo'=>'5793',
            'nombre' => 'Resolución de problemas y algoritmos',
        ]);

        DB::table('materias')->insert([
            'codigo'=>'5551',
            'nombre' => 'Análisis Matemático I',
        ]);

        DB::table('materias')->insert([
            'codigo'=>'7713',
            'nombre' => 'Introducción a la Programación Orientada a Objetos',
        ]);
    }
}
