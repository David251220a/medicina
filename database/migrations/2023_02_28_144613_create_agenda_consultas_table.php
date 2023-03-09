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
        Schema::create('agenda_consulta', function (Blueprint $table) {
            $table->id();
            $table->foreignId('paciente_id')->references('id')->on('paciente');
            $table->foreignId('doctor_turno_id')->references('id')->on('doctor_turno');
            // $table->foreignId('tipo_estudio_id')->references('id')->on('tipo_estudio');
            $table->foreignId('estado_consulta_id')->references('id')->on('estado_consulta');
            $table->dateTime('fecha_consulta');
            // $table->integer('dia')->default(0);
            $table->integer('orden')->default(0);
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
        Schema::dropIfExists('agenda_consulta');
    }
};
