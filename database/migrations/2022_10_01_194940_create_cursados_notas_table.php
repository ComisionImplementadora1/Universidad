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
        Schema::create('cursados_notas', function (Blueprint $table) {
            $table->id();
            $table->unsignedSmallInteger('nota');
            $table->unsignedSmallInteger('estado');
            $table->unsignedBigInteger('id_comision');
            $table->timestamps();

            $table->foreign('id_comision')->references('id')->on('comisiones')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cursado_notas');
    }
};
