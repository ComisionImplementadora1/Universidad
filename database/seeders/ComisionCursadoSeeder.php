<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComisionCursadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ComisionCursado')->insert([
            'Codigo'=>'423',
            'Profesor_id' => '9',
            'Asistente_id' => '0',
            'Ayudantes_id' => '4,7',
            'Inscriptos_id' => '0,1,2,3,4,5',
            'FechaInicio' => '2022-03-14',
            'FechaFinalizacion' => '2022-07-01',
            'Materia' => '5912',
            'Cupo' => '60'
            ]);

        DB::table('ComisionCursado')->insert([
            'Codigo'=>'32',
            'Profesor_id' => '4',
            'Asistente_id' => '5',
            'Ayudantes_id' => '3,2',
            'Inscriptos_id' => '0,1,2,3,4,5',
            'FechaInicio' => '2022-03-14',
            'FechaFinalizacion' => '2022-07-01',
            'Materia' => '5793',
            'Cupo' => '60'
            ]);

        DB::table('ComisionCursado')->insert([
            'Codigo'=>'53',
            'Profesor_id' => '3',
            'Asistente_id' => '2',
            'Ayudantes_id' => '6,9',
            'Inscriptos_id' => '0,2,3,4',
            'FechaInicio' => '2022-03-14',
            'FechaFinalizacion' => '2022-07-01',
            'Materia' => '5551',
            'Cupo' => '60'
            ]);

        DB::table('ComisionCursado')->insert([
            'Codigo'=>'343',
            'Profesor_id' => '6',
            'Asistente_id' => '7',
            'Ayudantes_id' => '4,5',
            'Inscriptos_id' => '0,1,2,3,4,5',
            'FechaInicio' => '2022-08-16',
            'FechaFinalizacion' => '2022-12-02',
            'Materia' => '7713',
            'Cupo' => '60'
            ]);

        DB::table('ComisionCursado')->insert([
            'Codigo'=>'22',
            'Profesor_id' => '1',
            'Asistente_id' => '4',
            'Ayudantes_id' => '2,7',
            'Inscriptos_id' => '0,1,2,3,4,5',
            'FechaInicio' => '2022-08-16',
            'FechaFinalizacion' => '2022-12-02',
            'Materia' => '7791',
            'Cupo' => '60'
            ]);

        DB::table('ComisionCursado')->insert([
            'Codigo'=>'11',
            'Profesor_id' => '8',
            'Asistente_id' => '6',
            'Ayudantes_id' => '5,4',
            'Inscriptos_id' => '2',
            'FechaInicio' => '2022-08-16',
            'FechaFinalizacion' => '2022-12-02',
            'Materia' => '3051',
            'Cupo' => '60'
            ]);

        DB::table('ComisionCursado')->insert([
            'Codigo'=>'34',
            'Profesor_id' => '4',
            'Asistente_id' => '7',
            'Ayudantes_id' => '2,7',
            'Inscriptos_id' => '3,4',
            'FechaInicio' => '2022-08-16',
            'FechaFinalizacion' => '2022-12-02',
            'Materia' => '7714',
            'Cupo' => '60'
            ]);
    }

}
