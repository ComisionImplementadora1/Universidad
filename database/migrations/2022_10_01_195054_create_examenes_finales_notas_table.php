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
        Schema::create('examenes_finales_notas', function (Blueprint $table) {
            $table->id();
            $table->unsignedSmallInteger('nota');
            $table->unsignedSmallInteger('estado');
            $table->unsignedBigInteger('id_examen_final');
            $table->timestamps();

            $table->foreign('id_examen_final')->references('id')->on('examenes_finales')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('examen_final_notas');
    }
};
