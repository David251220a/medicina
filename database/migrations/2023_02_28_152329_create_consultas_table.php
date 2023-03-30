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
        Schema::create('consulta', function (Blueprint $table) {
            $table->id();
            $table->foreignId('paciente_id')->references('id')->on('paciente');
            $table->foreignId('doctor_turno_id')->references('id')->on('doctor_turno');
            $table->foreignId('agenda_id')->references('id')->on('agenda_consulta');
            $table->string('diagnostico')->default(' ');
            $table->string('instrucciones')->nullable();
            $table->string('receta')->nullable();
            $table->string('reposo')->nullable();
            $table->string('estatura', 5)->nullable();
            $table->integer('peso')->nullable();
            $table->dateTime('fecha');
            $table->foreignId('estado_id')->references('id')->on('estado');
            $table->foreignId('usuario_alta')->references('id')->on('users');
            $table->foreignId('usuario_modificacion')->references('id')->on('users');
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
        Schema::dropIfExists('consulta');
    }
};
