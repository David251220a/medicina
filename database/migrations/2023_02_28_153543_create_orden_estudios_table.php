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
        Schema::create('orden_estudio', function (Blueprint $table) {
            $table->id();
            $table->foreignId('persona_id')->references('id')->on('persona');
            $table->foreignId('doctor_id')->references('id')->on('doctor');
            $table->foreignId('tipo_estudio_id')->references('id')->on('tipo_estudio');
            $table->foreignId('consulta_id')->references('id')->on('consulta');
            $table->string('observacion')->default(' ');
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
        Schema::dropIfExists('orden_estudio');
    }
};
