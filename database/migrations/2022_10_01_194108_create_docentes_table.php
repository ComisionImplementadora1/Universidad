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
        Schema::create('docentes', function (Blueprint $table) {
            $table->id();
            $table->unsignedSmallInteger('legajo');
            $table->unsignedSmallInteger('dni');
            $table->date('fecha de nacimiento');
            $table->string('mail')->unique();
            $table->string('usuario')->unique();
            $table->string('contraseña');
            $table->unsignedSmallInteger('rol');
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
        Schema::dropIfExists('docentes');
    }
};