<?php

namespace Database\Seeders;

use App\Models\EstadoConsulta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstadoConsultaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EstadoConsulta::create([
            'descripcion' => 'AGENDADO',
            'color' => 'FFF',
            'estado_id' => 1,
            'usuario_alta' => 1,
            'usuario_modificacion' => 1,
        ]);

        EstadoConsulta::create([
            'descripcion' => 'FINALIZADO',
            'color' => 'FFF',
            'estado_id' => 1,
            'usuario_alta' => 1,
            'usuario_modificacion' => 1,
        ]);

        EstadoConsulta::create([
            'descripcion' => 'AUSENTE',
            'color' => 'FFF',
            'estado_id' => 1,
            'usuario_alta' => 1,
            'usuario_modificacion' => 1,
        ]);
    }
}
