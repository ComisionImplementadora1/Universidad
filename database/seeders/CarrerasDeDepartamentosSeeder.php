<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarrerasDeDepartamentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('carreras_de_departamentos')->insert([
            'id_departamento'=>'1',
            'id_carrera'=>'1',
            'cod_carrera'=>'LCC'
        ]);

        DB::table('carreras_de_departamentos')->insert([
            'id_departamento'=>'1',
            'id_carrera'=>'2',
            'cod_carrera'=>'ISI'
        ]);

        DB::table('carreras_de_departamentos')->insert([
            'id_departamento'=>'1',
            'id_carrera'=>'3',
            'cod_carrera'=>'IC'
        ]);
    }
}
