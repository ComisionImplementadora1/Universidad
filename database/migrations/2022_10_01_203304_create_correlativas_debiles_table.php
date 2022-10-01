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
        Schema::create('correlativas_debiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_materia_origen');
            $table->unsignedBigInteger('id_materia_correlativa');
            
            $table->foreign('id_materia_origen')->references('id')->on('materias')->onDelete('cascade');
            $table->foreign('id_materia_correlativa')->references('id')->on('materias')->onDelete('cascade');
            
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
        Schema::dropIfExists('correlativas_debiles');
    }
};
