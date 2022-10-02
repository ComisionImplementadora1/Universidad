<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarrerasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('carreras')->insert([
            'codigo'=>'LCC',
            'Nombre'=> 'Ingeniería en Sistemas de Información',
            'Materias_codigos' => '5912-5793-5551-7713-7791'
            ]);

        DB::table('carreras')->insert([
            'codigo'=>'ISI',
            'Nombre'=> 'Ingeniería en Sistemas de Información',
            'Materias_codigos' => '5912-5793-5551-7713-7791-7714'
            ]);

        DB::table('carreras')->insert([
            'codigo'=>'IC',
            'Nombre'=> 'Ingeniería en Computación',
            'Materias_codigos' => '5912-5793-5551-7713-7791-3051'
            ]);
    }
}
