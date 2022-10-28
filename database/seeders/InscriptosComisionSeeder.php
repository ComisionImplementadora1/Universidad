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
            'id_alumno' => '1',
        ]);

        DB::table('inscriptos_comision')->insert([
            'id_comision'=>'1',
            'id_alumno' => '2',
        ]);

        DB::table('inscriptos_comision')->insert([
            'id_comision'=>'1',
            'id_alumno' => '4',
        ]);

        DB::table('inscriptos_comision')->insert([
            'id_comision'=>'1',
            'id_alumno' => '5',
        ]);

        DB::table('inscriptos_comision')->insert([
            'id_comision'=>'1',
            'id_alumno' => '6',
        ]);

        DB::table('inscriptos_comision')->insert([
            'id_comision'=>'2',
            'id_alumno' => '1',
        ]);
        
        DB::table('inscriptos_comision')->insert([
            'id_comision'=>'2',
            'id_alumno' => '2',
        ]);

        DB::table('inscriptos_comision')->insert([
            'id_comision'=>'2',
            'id_alumno' => '3',
        ]);

        DB::table('inscriptos_comision')->insert([
            'id_comision'=>'2',
            'id_alumno' => '4',
        ]);

        DB::table('inscriptos_comision')->insert([
            'id_comision'=>'2',
            'id_alumno' => '5',
        ]);

        DB::table('inscriptos_comision')->insert([
            'id_comision'=>'2',
            'id_alumno' => '6',
        ]);

        DB::table('inscriptos_comision')->insert([
            'id_comision'=>'3',
            'id_alumno' => '1',
        ]);

        DB::table('inscriptos_comision')->insert([
            'id_comision'=>'3',
            'id_alumno' => '3',
        ]);

        DB::table('inscriptos_comision')->insert([
            'id_comision'=>'3',
            'id_alumno' => '4',
        ]);

        DB::table('inscriptos_comision')->insert([
            'id_comision'=>'3',
            'id_alumno' => '5',
        ]);

        DB::table('inscriptos_comision')->insert([
            'id_comision'=>'4',
            'id_alumno' => '1',
        ]);
        
        DB::table('inscriptos_comision')->insert([
            'id_comision'=>'4',
            'id_alumno' => '2',
        ]);

        DB::table('inscriptos_comision')->insert([
            'id_comision'=>'4',
            'id_alumno' => '3',
        ]);

        DB::table('inscriptos_comision')->insert([
            'id_comision'=>'4',
            'id_alumno' => '4',
        ]);

        DB::table('inscriptos_comision')->insert([
            'id_comision'=>'4',
            'id_alumno' => '5',
        ]);

        DB::table('inscriptos_comision')->insert([
            'id_comision'=>'4',
            'id_alumno' => '6',
        ]);
    }
}
