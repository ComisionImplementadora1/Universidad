<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(DepartamentosSeeder::class);
        $this->call(CarrerasSeeder::class);
        $this->call(CarrerasDeDepartamentosSeeder::class);
        $this->call(MateriasSeeder::class);
        $this->call(MateriasDeCarrerasSeeder::class);
        $this->call(CorrelativasFuertesSeeder::class);
        $this->call(AlumnosSeeder::class);
        $this->call(DocentesSeeder::class);
        $this->call(AdministradoresSeeder::class);
        $this->call(ComisionCursadoSeeder::class);
        $this->call(AyudantesComisionSeeder::class);
        $this->call(InscriptosCarreraSeeder::class);
        $this->call(InscriptosComisionSeeder::class);
        $this->call(ExamenesFinalesSeeder::class);
        $this->call(InscriptosExamenesSeeder::class);
    }
}
