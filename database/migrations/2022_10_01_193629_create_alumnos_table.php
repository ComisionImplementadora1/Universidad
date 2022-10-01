<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->unsignedSmallInteger('lu')->unique();
            $table->unsignedSmallInteger('dni')->unique();
            $table->date('fecha de nacimiento');
            $table->string('mail')->unique();
            $table->string('usuario')->unique();
            $table->string('contraseña');
            
            $table->unsignedBigInteger('id_carrera');
            
            $table->foreign('id_carrera')->references('id')->on('carreras')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumnos');
    }
};