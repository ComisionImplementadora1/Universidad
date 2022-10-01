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
        Schema::create('examen_final', function (Blueprint $table) {
            $table->id();
            $table->text('observaciones');
            $table->date('fecha');
            $table->date('fecha_inicio_inscripciones');
            $table->date('fecha_fin_inscripciones');
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
        Schema::dropIfExists('examen_finals');
    }
};
