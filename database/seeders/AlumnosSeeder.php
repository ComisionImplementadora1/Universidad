<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlumnosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('alumnos')->insert([
            'nombre'=>'Hernan Indigo',
            'lu' => '101205',
            'dni' => '32432423',
            'fecha_de_nacimiento' => '2001-09-20',
            'mail' => 'her_ind@outlook.com',
            'id_carrera' => '3',
            'password' => bcrypt('123'),
            ]);

        DB::table('alumnos')->insert([
            'nombre'=>'Oriana Diaz',
            'lu' => '101206',
            'dni' => '41123543',
            'fecha_de_nacimiento' => '2001-08-02',
            'mail' => 'ori.diaz@gmail.cm',
            'id_carrera' => '1',
            'password' => bcrypt('123'),
         ]);

         DB::table('alumnos')->insert([
            'nombre'=>'Pedro Perez',
            'lu' => '101207',
            'dni' => '40987786',
            'fecha_de_nacimiento' => '2001-10-01',
            'mail' => 'peterperez@live.com',
            'id_carrera' => '3',
            'password' => bcrypt('123'),
         ]);

         DB::table('alumnos')->insert([
            'nombre'=>'Derek Iraoz',
            'lu' => '101208',
            'dni' => '38765678',
            'fecha_de_nacimiento' => '2001-05-06',
            'mail' => 'iraozdk@gmail.com',
            'id_carrera' => '2',
            'password' => bcrypt('123'),
         ]);

         DB::table('alumnos')->insert([
            'nombre'=>'Luciana Mercado',
            'lu' => '101209',
            'dni' => '32345654',
            'fecha_de_nacimiento' => '2000-02-01',
            'mail' => 'mercadoluciana@gmial.com',
            'id_carrera' => '2',
            'password' => bcrypt('123'),
         ]);

         DB::table('alumnos')->insert([
            'nombre'=>'Uriel Ortiz',
            'lu' => '101210',
            'dni' => '43543654',
            'fecha_de_nacimiento' => '2000-06-01',
            'mail' => 'uri_pz@gmail.com',
            'id_carrera' => '1',
            'password' => bcrypt('123'),
         ]);
    }
}
