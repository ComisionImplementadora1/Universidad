<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
            'Codgigo'=>'5912',
            'Nombre' => 'Elementos de Algebra y Geometría',
            'CorrelativasFuertes_codigos' => '',
            'CorrelativasDebiles_codigos' => '',
            'Carreras_codigos'=> 'LCC, ISI, IC'
            ]);

        DB::table('materias')->insert([
            'Codgigo'=>'5793',
            'Nombre' => 'Resolución de problemas y algoritmos',
            'CorrelativasFuertes_codigos' => '',
            'CorrelativasDebiles_codigos' => '',
            'Carreras_codigos'=> 'LCC, ISI, IC'
            ]);

        DB::table('materias')->insert([
            'Codgigo'=>'5551',
            'Nombre' => 'Análisis Matemático I',
            'CorrelativasFuertes_codigos' => '',
            'CorrelativasDebiles_codigos' => '',
            'Carreras_codigos'=> 'LCC, ISI, IC'
            ]);

        DB::table('materias')->insert([
            'Codgigo'=>'7713',
            'Nombre' => 'Introducción a la Programación Orientada a Objetos',
            'CorrelativasFuertes_codigos' => '5912-5793',
            'CorrelativasDebiles_codigos' => '',
            'Carreras_codigos'=> 'LCC, ISI, IC'
            ]);

        DB::table('materias')->insert([
            'Codgigo'=>'7791',
            'Nombre' => 'Lenguajes Formales y Autómatas',
            'CorrelativasFuertes_codigos' => '5912-5794',
            'CorrelativasDebiles_codigos' => '',
            'Carreras_codigos'=> 'LCC, ISI, IC'
            ]);

        DB::table('materias')->insert([
            'Codgigo'=>'3051',
            'Nombre' => 'Fisica I',
            'CorrelativasFuertes_codigos' => '',
            'CorrelativasDebiles_codigos' => '5551-5912',
            'Carreras_codigos'=> 'LCC, ISI, IC'
            ]);

        DB::table('materias')->insert([
            'Codgigo'=>'7714',
            'Nombre' => 'Introducción a la Ingeniería de Software',
            'CorrelativasFuertes_codigos' => '',
            'CorrelativasDebiles_codigos' => '',
            'Carreras_codigos'=> 'ISI'
            ]);
    }

}
