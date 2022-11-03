<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'nombre'=>'Ana',
            'apellido'=>'Falcon',
            'legajo' => '88789',
            'dni' => '21234654',
            'fecha_de_nacimiento' => '1972-10-012',
            'email' => 'ana.falcon@gmail.com',
            'password' => bcrypt('123'),
        ]);

        DB::table('docentes')->insert([
            'nombre'=>'Juana',
            'apellido'=>'Perez',
            'legajo' => '88778',
            'dni' => '18434564',
            'fecha_de_nacimiento' => '1972-11-02',
            'email' => 'juana.perez@gmail.com',
            'password' => bcrypt('123'),
        ]);

        DB::table('docentes')->insert([
            'nombre'=>'Sergio',
            'apellido'=>'Corpaz',
            'legajo' => '99782',
            'dni' => '23098007',
            'fecha_de_nacimiento' => '1980-12-01',
            'email' => 'serg.corpaz@gmail.com',
            'password' => bcrypt('123'),
        ]);

        DB::table('docentes')->insert([
            'nombre'=>'Maximiliano',
            'apellido'=>'Montesinos',
            'legajo' => '25924',
            'dni' => '19456478',
            'fecha_de_nacimiento' => '1982-10-06',
            'email' => 'maxi.montesinos@gmail.com',
            'password' => bcrypt('123'),
        ]);

        DB::table('docentes')->insert([
            'nombre'=>'Gabriel',
            'apellido'=>'Fernandez',
            'legajo' => '66589',
            'dni' => '18566432',
            'fecha_de_nacimiento' => '1972-06-06',
            'email' => 'gabriel.fer@gmail.com',
            'password' => bcrypt('123'),
        ]);

        DB::table('docentes')->insert([
            'nombre'=>'Joaquin',
            'apellido'=>'Navarro',
            'legajo' => '89724',
            'dni' => '29432123',
            'fecha_de_nacimiento' =>'1972-08-01',
            'email' => 'joaquin.n@gmail.com',
            'password' => bcrypt('123'),
        ]);

        DB::table('docentes')->insert([
            'nombre'=>'Diana',
            'apellido'=>'Chavez',
            'legajo' => '77891',
            'dni' => '22455567',
            'fecha_de_nacimiento' =>'1972-05-02',
            'email' => 'diana.chavez@gmail.com',
            'password' => bcrypt('123'),
        ]);

        DB::table('docentes')->insert([
            'nombre'=>'Nicolas',
            'apellido'=>'Pontet',
            'legajo' => '77310',
            'dni' => '23459753',
            'fecha_de_nacimiento' =>'1972-06-01',
            'email' => 'nico.pontet@gmail.com',
            'password' => bcrypt('123'),
        ]);

        DB::table('docentes')->insert([
            'nombre'=>'Cristian',
            'apellido'=>'Angelini',
            'legajo' => '44710',
            'dni' => '20765432',
            'fecha_de_nacimiento' => '1972-03-03',
            'email' => 'cris.ang@gmail.com',
            'password' => bcrypt('123'),
        ]);

        DB::table('docentes')->insert([
            'nombre'=>'Laura',
            'apellido'=>'Quiroz',
            'legajo' => '33471',
            'dni' => '21874764',
            'fecha_de_nacimiento' => '1972-05-04',
            'email' => 'laura.qrz@gmail.com',
            'password' => bcrypt('123'),
        ]);

   }
}
