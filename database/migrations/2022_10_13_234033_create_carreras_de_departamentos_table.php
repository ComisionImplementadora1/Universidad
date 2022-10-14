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
        Schema::create('carreras_de_departamentos', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_departamento');
            $table->unsignedBigInteger('id_carrera');
            $table->string('cod_carrera');
            
            $table->foreign('id_departamento')->references('id')->on('departamentos')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_carrera')->references('id')->on('carreras')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('carreras_de_departamentos');
    }
};
