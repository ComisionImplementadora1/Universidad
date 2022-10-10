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
            'nombre'=>'Ana Falcon',
            'legajo' => '88789',
            'dni' => '21234654',
            'fecha_de_nacimiento' => '1972-10-012',
            'mail' => 'ana.falcon@gmail.com',
            'password' => bcrypt('123'),
        ]);

        DB::table('docentes')->insert([
            'nombre'=>'Juana Perez',
            'legajo' => '88778',
            'dni' => '18434564',
            'fecha_de_nacimiento' => '1972-11-02',
            'mail' => 'juana.perez@gmail.com',
            'password' => bcrypt('123'),
        ]);

        DB::table('docentes')->insert([
            'nombre'=>'Sergio Corpaz',
            'legajo' => '99782',
            'dni' => '23098007',
            'fecha_de_nacimiento' => '1980-12-01',
            'mail' => 'serg.corpaz@gmail.com',
            'password' => bcrypt('123'),
        ]);

        DB::table('docentes')->insert([
            'nombre'=>'Maximiliano Montesinos',
            'legajo' => '25924',
            'dni' => '19456478',
            'fecha_de_nacimiento' => '1982-10-06',
            'mail' => 'maxi.montesinos@gmail.com',
            'password' => bcrypt('123'),
        ]);

        DB::table('docentes')->insert([
            'nombre'=>'Gabriel Fernandez',
            'legajo' => '66589',
            'dni' => '18566432',
            'fecha_de_nacimiento' => '1972-06-06',
            'mail' => 'gabriel.fer@gmail.com',
            'password' => bcrypt('123'),
        ]);

        DB::table('docentes')->insert([
            'nombre'=>'Joaquin Navarro',
            'legajo' => '89724',
            'dni' => '29432123',
            'fecha_de_nacimiento' =>'1972-08-01',
            'mail' => 'joaquin.n@gmail.com',
            'password' => bcrypt('123'),
        ]);

        DB::table('docentes')->insert([
            'nombre'=>'Diana Chavez',
            'legajo' => '77891',
            'dni' => '22455567',
            'fecha_de_nacimiento' =>'1972-05-02',
            'mail' => 'diana.chavez@gmail.com',
            'password' => bcrypt('123'),
        ]);

        DB::table('docentes')->insert([
            'nombre'=>'Nicolas Pontet',
            'legajo' => '77310',
            'dni' => '23459753',
            'fecha_de_nacimiento' =>'1972-06-01',
            'mail' => 'nico.pontet@gmail.com',
            'password' => bcrypt('123'),
        ]);

        DB::table('docentes')->insert([
            'nombre'=>'Cristian Angelini',
            'legajo' => '44710',
            'dni' => '20765432',
            'fecha_de_nacimiento' => '1972-03-03',
            'mail' => 'cris.ang@gmail.com',
            'password' => bcrypt('123'),
        ]);

        DB::table('docentes')->insert([
            'nombre'=>'Laura Quiroz',
            'legajo' => '33471',
            'dni' => '21874764',
            'fecha_de_nacimiento' => '1972-05-04',
            'mail' => 'laura.qrz@gmail.com',
            'password' => bcrypt('123'),
        ]);

   }
}
