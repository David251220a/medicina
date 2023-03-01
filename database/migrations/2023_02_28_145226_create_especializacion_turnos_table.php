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
        Schema::create('especializacion_turno', function (Blueprint $table) {
            $table->id();
            $table->foreignId('especialidad_id')->references('id')->on('especialidad');
            $table->foreignId('tipo_estudio_id')->references('id')->on('tipo_estudio');
            $table->integer('dia')->default(0);
            $table->time('hora_desde');
            $table->time('hora_hasta');
            $table->boolean('tiene_orden')->default(false);
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
        Schema::dropIfExists('especializacion_turno');
    }
};
