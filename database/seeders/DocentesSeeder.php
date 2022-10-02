<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DocentesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('docentes')->insert([
            'nombre'=>'Ana Falcon',
            'legajo' => '88789',
            'DNI' => '21234654',
            'FechaNacimiento' => '1972-10-012',
            'Mail' => 'ana.falcon@gmail.com',
            'Usuario' => 'anaFalcon',
            'Contrasena' => '7715',
            'Rol' => '0'

            ]);

        DB::table('docentes')->insert([
            'nombre'=>'Juana Perez',
            'legajo' => '88778',
            'DNI' => '18434564',
            'FechaNacimiento' => '1972-11-02',
            'Mail' => 'juana.perez@gmail.com',
            'Usuario' => 'juanaPerez',
            'Contrasena' => '8845',
            'Rol' => '0'

            ]);

        DB::table('docentes')->insert([
            'nombre'=>'Sergio Corpaz',
            'legajo' => '99782',
            'DNI' => '23098007',
            'FechaNacimiento' => '1980-12-01',
            'Mail' => 'serg.corpaz@gmail.com',
            'Usuario' => 'sergioCorpaz',
            'Contrasena' => '9987',
            'Rol' => '1'

            ]);

        DB::table('docentes')->insert([
            'nombre'=>'Maximiliano Montesinos',
            'legajo' => '25924',
            'DNI' => '19456478',
            'FechaNacimiento' => '1982-10-06',
            'Mail' => 'maxi.montesinos@gmail.com',
            'Usuario' => 'maxiMontero',
            'Contrasena' => '65478',
            'Rol' => '2'

            ]);

        DB::table('docentes')->insert([
            'nombre'=>'Gabriel Fernandez',
            'legajo' => '66589',
            'DNI' => '18566432',
            'FechaNacimiento' => '1972-06-06',
            'Mail' => 'gabriel.fer@gmail.com',
            'Usuario' => 'gaFernandez',
            'Contrasena' => '9999',
            'Rol' => '1'

            ]);

        DB::table('docentes')->insert([
            'nombre'=>'Joaquin Navarro',
            'legajo' => '89724',
            'DNI' => '29432123',
            'FechaNacimiento' =>'1972-08-01',
            'Mail' => 'joaquin.n@gmail.com',
            'Usuario' => 'joaquinNavarro',
            'Contrasena' => '65241',
            'Rol' => '0'

            ]);

        DB::table('docentes')->insert([
            'nombre'=>'Diana Chavez',
            'legajo' => '77891',
            'DNI' => '22455567',
            'FechaNacimiento' =>'1972-05-02',
            'Mail' => 'diana.chavez@gmail.com',
            'Usuario' => 'dianaChavez',
            'Contrasena' => '35412',
            'Rol' => '0'

            ]);

        DB::table('docentes')->insert([
            'nombre'=>'Nicolas Pontet',
            'legajo' => '77310',
            'DNI' => '23459753',
            'FechaNacimiento' =>'1972-06-01',
            'Mail' => 'nico.pontet@gmail.com',
            'Usuario' => 'nicoPontet',
            'Contrasena' => '89797',
            'Rol' => '1'

            ]);

        DB::table('docentes')->insert([
            'nombre'=>'Cristian Angelini',
            'legajo' => '44710',
            'DNI' => '20765432',
            'FechaNacimiento' => '1972-03-03',
            'Mail' => 'cris.ang@gmail.com',
            'Usuario' => 'crisAngelini',
            'Contrasena' => '897971',
            'Rol' => '1'

            ]);

        DB::table('docentes')->insert([
            'nombre'=>'Laura Quiroz',
            'legajo' => '33471',
            'DNI' => '21874764',
            'FechaNacimiento' => '1972-05-04',
            'Mail' => 'laura.qrz@gmail.com',
            'Usuario' => 'lauQuiroz',
            'Contrasena' => '17982',
            'Rol' => '2'

            ]);


   }
}
