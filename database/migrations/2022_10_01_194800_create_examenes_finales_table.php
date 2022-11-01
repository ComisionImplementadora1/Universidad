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
        Schema::create('examenes_finales', function (Blueprint $table) {
            $table->id();
            $table->text('observaciones');
            $table->date('fecha');
            $table->date('fecha_inicio_inscripciones');
            $table->date('fecha_fin_inscripciones');
            $table->unsignedBigInteger('id_materia');
            $table->unsignedBigInteger('id_docente');
            $table->unsignedBigInteger('id_carrera');
            $table->timestamps();

            $table->foreign('id_materia')->references('id')->on('materias')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_docente')->references('id')->on('docentes')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_carrera')->references('id')->on('carreras')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('examen_finales');
    }
};
