<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComisionCursadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comisiones')->insert([
            'codigo'=>'423',
            'fecha_inicio' => '2022-03-14',
            'fecha_fin' => '2022-07-01',
            'cupo'=> '60',
            'id_profesor' => '10',
            'id_asistente' => '1',
            'id_materia' => '1',
        ]);

        DB::table('comisiones')->insert([
            'codigo'=>'32',
            'fecha_inicio' => '2022-03-14',
            'fecha_fin' => '2022-07-01',
            'cupo' => '60',
            'id_profesor' => '5',
            'id_asistente' => '6',
            'id_materia' => '2',
        ]);

        DB::table('comisiones')->insert([
            'codigo'=>'53',
            'fecha_inicio' => '2022-03-14',
            'fecha_fin' => '2022-07-01',
            'cupo' => '60',
            'id_profesor' => '4',
            'id_asistente' => '3',
            'id_materia' => '3',
        ]);

        DB::table('comisiones')->insert([
            'codigo'=>'343',
            'fecha_inicio' => '2022-08-16',
            'fecha_fin' => '2022-12-02',
            'cupo' => '60',
            'id_profesor' => '7',
            'id_asistente' => '8',
            'id_materia' => '4',
        ]);
    }

}
