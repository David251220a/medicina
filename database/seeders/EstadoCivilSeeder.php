<?php

namespace Database\Seeders;

use App\Models\Estado_Civil;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstadoCivilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Estado_Civil::create([
            'descripcion' => 'SOLTERO/A',
            'estado_id' => 1,
            'usuario_alta' => 1,
            'usuario_modificacion' => 1,
        ]);

        Estado_Civil::create([
            'descripcion' => 'CASADO/A',
            'estado_id' => 1,
            'usuario_alta' => 1,
            'usuario_modificacion' => 1,
        ]);

        Estado_Civil::create([
            'descripcion' => 'DIVORCIADO/A',
            'estado_id' => 1,
            'usuario_alta' => 1,
            'usuario_modificacion' => 1,
        ]);

        Estado_Civil::create([
            'descripcion' => 'VIUDO/A',
            'estado_id' => 1,
            'usuario_alta' => 1,
            'usuario_modificacion' => 1,
        ]);
    }
}
