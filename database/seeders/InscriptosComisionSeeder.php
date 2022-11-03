<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InscriptosComisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('inscriptos_comision')->insert([
            'id_comision'=>'1',
            'id_alumno' => '3',
            'estado' => 'aprobado'
        ]);

        DB::table('inscriptos_comision')->insert([
            'id_comision'=>'2',
            'id_alumno' => '3',
            'estado' => 'promocionado',
            'nota' => '7'
        ]);
    }
}
