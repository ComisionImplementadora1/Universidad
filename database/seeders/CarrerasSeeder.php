<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'nombre'=> 'Licenciatura en Ciencias de la Computación',
            'id_departamento' => '1',
        ]);

        DB::table('carreras')->insert([
            'codigo'=>'ISI',
            'nombre'=> 'Ingeniería en Sistemas de Información',
            'id_departamento' => '1',
        ]);

        DB::table('carreras')->insert([
            'codigo'=>'IC',
            'nombre'=> 'Ingeniería en Computación',
            'id_departamento' => '1',
        ]);
    }
}
