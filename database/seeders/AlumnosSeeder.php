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
        DB::table('drivers')->insert([
            'nombre'=>'Hernan Indigo',
            'LU' => '101205',
            'DNI' => '32432423',
            'FechaNacimiento' => '2001-09-20',
            'Mail' => 'her_ind@outlook.com',
            'Usuario' => 'hernanIndigo',
            'Contrasena' => 'abc123',
            'Carrera' => 'IC',
            'HistorialMaterias' => '0,1,2,3,4',
            'HistorialExamenesFinales' => ''

            ]);

        DB::table('drivers')->insert([
            'nombre'=>'Oriana Diaz',
            'LU' => '101206',
            'DNI' => '41123543',
            'FechaNacimiento' => '2001-08-02',
            'Mail' => 'ori.diaz@gmail.cm',
            'Usuario' => 'oriDiaz',
            'Contrasena' => 'bca928',
            'Carrera' => 'LCC' ,
            'HistorialMaterias' => '5,6,7,8' ,
            'HistorialExamenesFinales' => ''

            ]);

         DB::table('drivers')->insert([
            'nombre'=>'Pedro Perez',
            'LU' => '101207',
            'DNI' => '40987786',
            'FechaNacimiento' => '2001-10-01',
            'Mail' => 'peterperez@live.com',
            'Usuario' => 'pedroPerez',
            'Contrasena' => 'adfm543',
            'Carrera' => 'IC',
            'HistorialMaterias' => '9,10,11,12,13,14' ,
            'HistorialExamenesFinales' => '1,4' 

            ]);

         DB::table('drivers')->insert([
            'nombre'=>'Derek Iraoz',
            'LU' => '101208',
            'DNI' => '38765678',
            'FechaNacimiento' => '2001-05-06',
            'Mail' => 'iraozdk@gmail.com',
            'Usuario' => 'derekIraoz',
            'Contrasena' => 'pok983',
            'Carrera' => 'ISI',
            'HistorialMaterias' => '15,16,17,18,19,20' ,
            'HistorialExamenesFinales' => ''

            ]);

         DB::table('drivers')->insert([
            'nombre'=>'Luciana Mercado',
            'LU' => '101209',
            'DNI' => '32345654',
            'FechaNacimiento' => '2000-02-01',
            'Mail' => 'mercadoluciana@gmial.com',
            'Usuario' => 'lucianaMercado',
            'Contrasena' => 'ssd231',
            'Carrera' => 'ISI',
            'HistorialMaterias' => '21,22,23,24,25,26 ',
            'HistorialExamenesFinales' => '2'

            ]);

         DB::table('drivers')->insert([
            'nombre'=>'Uriel Ortiz',
            'LU' => '101210',
            'DNI' => '43543654',
            'FechaNacimiento' => '2000-06-01',
            'Mail' => 'uri_pz@gmail.com',
            'Usuario' => 'urielOrtiz',
            'Contrasena' => 'hms211',
            'Carrera' => 'LCC' ,
            'HistorialMaterias' => '27,28,29,30',
            'HistorialExamenesFinales' => '3'

            ]);
    }
}
