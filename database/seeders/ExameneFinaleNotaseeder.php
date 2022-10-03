<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExameneFinaleNotaseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('alumnos')->insert([
            'ExamenFinal'=>'2',
            'Nota' => '',
            'Estado' => '0',
            ]);

        DB::table('alumnos')->insert([
            'ExamenFinal'=>'3',
            'Nota' => '',
            'Estado' => '3',
            ]);

        DB::table('alumnos')->insert([
            'ExamenFinal'=>'4',
            'Nota' => '2',
            'Estado' => '1',
            ]);

        DB::table('alumnos')->insert([
            'ExamenFinal'=>'5',
            'Nota' => '10',
            'Estado' => '2',
            ]);
    }
}
