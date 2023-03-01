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
        Schema::create('persona', function (Blueprint $table) {
            $table->id();
            $table->string('documento', 12);
            $table->string('apellido', 80);
            $table->string('nombre', 80);
            $table->foreignId('estado_civil_id')->references('id')->on('estado_civil');
            $table->foreignId('pais_id')->references('id')->on('pais');
            $table->foreignId('departamento_id')->references('id')->on('departamento');
            $table->foreignId('ciudad_id')->references('id')->on('ciudad');
            $table->date('fecha_nacimiento')->nullable();
            $table->string('barrio', 150);
            $table->string('direccion', 200);
            $table->integer('sexo')->default(0);
            $table->string('celular', 12)->nullable();
            $table->string('direccion_laboral', 200)->nullable();
            $table->string('telefono_laboral', 12)->nullable();
            $table->boolean('fallecido')->default(false);
            $table->string('motivo_inactivo', 200)->nullable();
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
        Schema::dropIfExists('persona');
    }
};
