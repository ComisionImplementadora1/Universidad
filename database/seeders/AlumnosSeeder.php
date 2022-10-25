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
            'nombre'=>'Hernan',
            'apellido'=> 'Indigo',
            'lu' => '101205',
            'dni' => '32432423',
            'fecha_de_nacimiento' => '2001-09-20',
            'email' => 'her_ind@outlook.com',
            'password' => bcrypt('123'),
            ]);

        DB::table('alumnos')->insert([
            'nombre'=>'Oriana',
            'apellido'=> 'Diaz',
            'lu' => '101206',
            'dni' => '41123543',
            'fecha_de_nacimiento' => '2001-08-02',
            'email' => 'ori.diaz@gmail.cm',
            'password' => bcrypt('123'),
         ]);

         DB::table('alumnos')->insert([
            'nombre'=>'Pedro',
            'apellido'=> 'Perez',
            'lu' => '101207',
            'dni' => '40987786',
            'fecha_de_nacimiento' => '2001-10-01',
            'email' => 'peterperez@live.com',
            'password' => bcrypt('123'),
         ]);

         DB::table('alumnos')->insert([
            'nombre'=>'Derek',
            'apellido'=> 'Iraoz',
            'lu' => '101208',
            'dni' => '38765678',
            'fecha_de_nacimiento' => '2001-05-06',
            'email' => 'iraozdk@gmail.com',
            'password' => bcrypt('123'),
         ]);

         DB::table('alumnos')->insert([
            'nombre'=>'Luciana',
            'apellido'=> 'Mercado',
            'lu' => '101209',
            'dni' => '32345654',
            'fecha_de_nacimiento' => '2000-02-01',
            'email' => 'mercadoluciana@gmial.com',
            'password' => bcrypt('123'),
         ]);

         DB::table('alumnos')->insert([
            'nombre'=>'Uriel',
            'apellido'=> 'Ortiz',
            'lu' => '101210',
            'dni' => '43543654',
            'fecha_de_nacimiento' => '2000-06-01',
            'email' => 'uri_pz@gmail.com',
            'password' => bcrypt('123'),
         ]);
    }
}
