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
        Schema::create('inscriptos_examenes', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_examen');
            $table->unsignedBigInteger('id_alumno');
            $table->string('estado')->nullable();
            $table->unsignedInteger('nota')->nullable();
            
            $table->foreign('id_examen')->references('id')->on('examenes_finales')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_alumno')->references('id')->on('alumnos')->onUpdate('cascade')->onDelete('cascade');
           
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
        Schema::dropIfExists('inscriptos_examenes');
    }
};
