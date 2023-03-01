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
            $table->foreignId('persona_id')->references('id')->on('persona');
            $table->foreignId('doctor_turno_id')->references('id')->on('doctor_turno');
            $table->foreignId('tipo_estudio_id')->references('id')->on('tipo_estudio');
            $table->foreignId('agenda_id')->references('id')->on('agenda_consulta');
            $table->string('diagnostico')->default(' ');
            $table->string('instrucciones')->default(' ');
            $table->string('receta')->default(' ');
            $table->string('reposo')->default(' ');
            $table->string('estatura', 5)->default(' ');
            $table->integer('peso')->default(0);
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
