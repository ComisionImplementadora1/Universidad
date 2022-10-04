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
        Schema::create('historial_materias', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_alumno');
            $table->unsignedBigInteger('id_nota');
            
            $table->foreign('id_alumno')->references('id')->on('alumnos')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_nota')->references('id')->on('cursados_notas')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('historial_materias');
    }
};
