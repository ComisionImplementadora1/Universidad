<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class administradoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('administradores')->insert([
            'nombre'=>'Pedro Ramirez',
            'Legajo' => '87592',
            'DNI' => '18555369',
            'FechaNacimiento' => '1972-03-20',
            'Mail' => 'admin1@gmail.com',
            'Usuario' => 'admin1',
            'Contraseña' => 'admin12'
            ]);

        DB::table('administradores')->insert([
            'nombre'=>'Susana Gutierrez',
            'Legajo' => '58921',
            'DNI' => '20005897',
            'FechaNacimiento' => '1982-09-01',
            'Mail' => 'admin2@gmail.com',
            'Usuario' => 'admin2',
            'Contraseña' => 'admin22'
            ]);
    }
}
