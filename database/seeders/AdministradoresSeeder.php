<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'legajo' => '87592',
            'dni' => '18555369',
            'email' => 'admin1@gmail.com',
            'password' => bcrypt('admin12')
            ]);

        DB::table('administradores')->insert([
            'nombre'=>'Susana Gutierrez',
            'legajo' => '58921',
            'dni' => '20005897',
            'email' => 'admin2@gmail.com',
            'password' => bcrypt('admin22')
            ]);
    }
}
