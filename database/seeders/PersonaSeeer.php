<?php

namespace Database\Seeders;

use App\Models\Persona;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PersonaSeeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Persona::create([
            'documento' => '123456789',
            'apellido' => 'ADMIN',
            'nombre' => 'ADMIN',
            'estado_civil_id' => 1,
            'pais_id' => 1,
            'departamento_id' => 1,
            'ciudad_id' => 1,
            'fecha_nacimiento' => '1998-11-11',
            'barrio' => 'SAN JUAN',
            'direccion' => 'RUTA 1 KM 19, 500',
            'sexo' => 1,
            'celular' => '0976123456',
            'direccion_laboral' => '',
            'telefono_laboral' => '',
            'fallecido' => 0,
            'motivo_inactivo' => '',
            'estado_id' => 1,
            'usuario_alta' => 1,
            'usuario_modificacion' => 1,
        ]);
    }
}
