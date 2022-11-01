<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InscriptosExamenesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('inscriptos_examenes')->insert([
            'id_examen'=>'1',
            'id_alumno' => '3',
            'estado' => 'aprobado',
            'nota' => '7',
        ]);

        DB::table('inscriptos_examenes')->insert([
            'id_examen'=>'2',
            'id_alumno' => '3',
            'estado' => 'aprobado',
            'nota' => '8',
        ]);
    }
}
