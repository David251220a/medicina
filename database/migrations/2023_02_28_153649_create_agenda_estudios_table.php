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
        Schema::create('agenda_estudio', function (Blueprint $table) {
            $table->id();
            $table->foreignId('especializacion_turno_id')->references('id')->on('especializacion_turno');
            $table->foreignId('estado_estudio_id')->references('id')->on('estado_estudio');
            $table->foreignId('orden_estudio_id')->references('id')->on('orden_estudio');
            $table->dateTime('fecha_agenda');
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
        Schema::dropIfExists('agenda_estudio');
    }
};
