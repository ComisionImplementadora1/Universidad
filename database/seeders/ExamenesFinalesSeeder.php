<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExamenesFinalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('examenes_finales')->insert([
            'id_materia' => '1',
            'id_docente' => '1',
            'id_carrera' => '1',
            'fecha' => '2022-12-19',
            'observaciones' => 'Aula 12',
            'fecha_inicio_inscripciones' => '2022-11-29',
            'fecha_fin_inscripciones' => '2022-12-18',
            ]);

        DB::table('examenes_finales')->insert([
            'id_materia' => '2',
            'id_docente' => '1',
            'id_carrera' => '1',
            'fecha' => '2022-07-02',
            'observaciones' => 'Aula 110',
            'fecha_inicio_inscripciones' => '2022-06-12',
            'fecha_fin_inscripciones' => '2022-07-01',
            ]);

        /*DB::table('ExamenesFinales')->insert([
            'Inscriptos'=>'4',
            'Materia' => '3',
            'Docente' => '3',
            'Carrera' => '2',
            'Fecha' => '2022-09-23',
            'Observaciones' => 'Aula 40',
            'FechaInicioInscripcion' => '2022-09-03',
            'FechaFinInscripcion' => '2022-09-22',
            ]);

        DB::table('ExamenesFinales')->insert([
            'Inscriptos'=>'5',
            'Materia' => '4',
            'Docente' => '5',
            'Carrera' => '0',
            'Fecha' => '2022-08-25',
            'Observaciones' => 'Aula 51',
            'FechaInicioInscripcion' => '2022-08-05',
            'FechaFinInscripcion' => '2022-08-24',
            ]);

        DB::table('ExamenesFinales')->insert([
            'Inscriptos'=>'2',
            'Materia' => '5',
            'Docente' => '4',
            'Carrera' => '1',
            'Fecha' => '2022-11-03',
            'Observaciones' => 'Aula 21',
            'FechaInicioInscripcion' => '2022-10-14',
            'FechaFinInscripcion' => '2022-11-02',
            ]);

        DB::table('ExamenesFinales')->insert([
            'Inscriptos'=>'',
            'Materia' => '6',
            'Docente' => '6',
            'Carrera' => '2',
            'Fecha' => '2022-07-28',
            'Observaciones' => 'Aula 12',
            'FechaInicioInscripcion' => '2022-07-08',
            'FechaFinInscripcion' => '2022-07-27',
            ]);*/

    }
}
