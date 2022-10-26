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
        Schema::create('comisiones', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('codigo')->unique();
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->unsignedInteger('cupo');

            $table->unsignedBigInteger('id_profesor')->nullable();
            $table->unsignedBigInteger('id_asistente')->nullable();
            $table->unsignedBigInteger('id_materia')->nullable();

            $table->foreign('id_profesor')->references('id')->on('docentes')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_asistente')->references('id')->on('docentes')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_materia')->references('id')->on('materias')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('comisiones');
    }
};
