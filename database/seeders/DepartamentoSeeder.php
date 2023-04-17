<?php

namespace Database\Seeders;

use App\Models\Departamento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $asu = Departamento::create([
            'pais_id' => 1,
            'descripcion' => 'ASUNCIÓN',
            'estado_id' => 1,
            'usuario_alta' => 1,
            'usuario_modificacion' => 1,
        ]);

        $asu->ciudad()->create([
            'pais_id' => 1,
            'descripcion' => 'SIN ESPECIFICAR',
            'estado_id' => 1,
            'usuario_alta' => 1,
            'usuario_modificacion' => 1,
        ]);

        $conc = Departamento::create([
            'pais_id' => 1,
            'descripcion' => 'CONCEPCION',
            'estado_id' => 1,
            'usuario_alta' => 1,
            'usuario_modificacion' => 1,
        ]);

        $conc->ciudad()->create([
            'pais_id' => 1,
            'descripcion' => 'SIN ESPECIFICAR',
            'estado_id' => 1,
            'usuario_alta' => 1,
            'usuario_modificacion' => 1,
        ]);

        $san = Departamento::create([
            'pais_id' => 1,
            'descripcion' => 'SAN PEDRO',
            'estado_id' => 1,
            'usuario_alta' => 1,
            'usuario_modificacion' => 1,
        ]);

        $san->ciudad()->create([
            'pais_id' => 1,
            'descripcion' => 'SIN ESPECIFICAR',
            'estado_id' => 1,
            'usuario_alta' => 1,
            'usuario_modificacion' => 1,
        ]);

        $coo = Departamento::create([
            'pais_id' => 1,
            'descripcion' => 'COORDILLERA',
            'estado_id' => 1,
            'usuario_alta' => 1,
            'usuario_modificacion' => 1,
        ]);

        $coo->ciudad()->create([
            'pais_id' => 1,
            'descripcion' => 'SIN ESPECIFICAR',
            'estado_id' => 1,
            'usuario_alta' => 1,
            'usuario_modificacion' => 1,
        ]);

        $GUA = Departamento::create([
            'pais_id' => 1,
            'descripcion' => 'GUAIRA',
            'estado_id' => 1,
            'usuario_alta' => 1,
            'usuario_modificacion' => 1,
        ]);

        $GUA->ciudad()->create([
            'pais_id' => 1,
            'descripcion' => 'SIN ESPECIFICAR',
            'estado_id' => 1,
            'usuario_alta' => 1,
            'usuario_modificacion' => 1,
        ]);

        $CAA = Departamento::create([
            'pais_id' => 1,
            'descripcion' => 'CAAGUAZU',
            'estado_id' => 1,
            'usuario_alta' => 1,
            'usuario_modificacion' => 1,
        ]);

        $CAA->ciudad()->create([
            'pais_id' => 1,
            'descripcion' => 'SIN ESPECIFICAR',
            'estado_id' => 1,
            'usuario_alta' => 1,
            'usuario_modificacion' => 1,
        ]);

        $CAZ = Departamento::create([
            'pais_id' => 1,
            'descripcion' => 'CAAZAPA',
            'estado_id' => 1,
            'usuario_alta' => 1,
            'usuario_modificacion' => 1,
        ]);

        $CAZ->ciudad()->create([
            'pais_id' => 1,
            'descripcion' => 'SIN ESPECIFICAR',
            'estado_id' => 1,
            'usuario_alta' => 1,
            'usuario_modificacion' => 1,
        ]);

        $ITA = Departamento::create([
            'pais_id' => 1,
            'descripcion' => 'ITAPUA',
            'estado_id' => 1,
            'usuario_alta' => 1,
            'usuario_modificacion' => 1,
        ]);

        $ITA->ciudad()->create([
            'pais_id' => 1,
            'descripcion' => 'SIN ESPECIFICAR',
            'estado_id' => 1,
            'usuario_alta' => 1,
            'usuario_modificacion' => 1,
        ]);

        $MI = Departamento::create([
            'pais_id' => 1,
            'descripcion' => 'MISIONES',
            'estado_id' => 1,
            'usuario_alta' => 1,
            'usuario_modificacion' => 1,
        ]);

        $MI->ciudad()->create([
            'pais_id' => 1,
            'descripcion' => 'SIN ESPECIFICAR',
            'estado_id' => 1,
            'usuario_alta' => 1,
            'usuario_modificacion' => 1,
        ]);

        $PAR = Departamento::create([
            'pais_id' => 1,
            'descripcion' => 'PARAGUARI',
            'estado_id' => 1,
            'usuario_alta' => 1,
            'usuario_modificacion' => 1,
        ]);

        $PAR->ciudad()->create([
            'pais_id' => 1,
            'descripcion' => 'SIN ESPECIFICAR',
            'estado_id' => 1,
            'usuario_alta' => 1,
            'usuario_modificacion' => 1,
        ]);

        $AL = Departamento::create([
            'pais_id' => 1,
            'descripcion' => 'ALTO PARANA',
            'estado_id' => 1,
            'usuario_alta' => 1,
            'usuario_modificacion' => 1,
        ]);

        $AL->ciudad()->create([
            'pais_id' => 1,
            'descripcion' => 'SIN ESPECIFICAR',
            'estado_id' => 1,
            'usuario_alta' => 1,
            'usuario_modificacion' => 1,
        ]);

        $CE = Departamento::create([
            'pais_id' => 1,
            'descripcion' => 'CENTRAL',
            'estado_id' => 1,
            'usuario_alta' => 1,
            'usuario_modificacion' => 1,
        ]);

        $CE->ciudad()->create([
            'pais_id' => 1,
            'descripcion' => 'SIN ESPECIFICAR',
            'estado_id' => 1,
            'usuario_alta' => 1,
            'usuario_modificacion' => 1,
        ]);

        $NE = Departamento::create([
            'pais_id' => 1,
            'descripcion' => 'ÑEMMBUCU',
            'estado_id' => 1,
            'usuario_alta' => 1,
            'usuario_modificacion' => 1,
        ]);

        $NE->ciudad()->create([
            'pais_id' => 1,
            'descripcion' => 'SIN ESPECIFICAR',
            'estado_id' => 1,
            'usuario_alta' => 1,
            'usuario_modificacion' => 1,
        ]);

        $AMA = Departamento::create([
            'pais_id' => 1,
            'descripcion' => 'AMANBAY',
            'estado_id' => 1,
            'usuario_alta' => 1,
            'usuario_modificacion' => 1,
        ]);

        $AMA->ciudad()->create([
            'pais_id' => 1,
            'descripcion' => 'SIN ESPECIFICAR',
            'estado_id' => 1,
            'usuario_alta' => 1,
            'usuario_modificacion' => 1,
        ]);

        $CANI = Departamento::create([
            'pais_id' => 1,
            'descripcion' => 'CANINDEYU',
            'estado_id' => 1,
            'usuario_alta' => 1,
            'usuario_modificacion' => 1,
        ]);

        $CANI->ciudad()->create([
            'pais_id' => 1,
            'descripcion' => 'SIN ESPECIFICAR',
            'estado_id' => 1,
            'usuario_alta' => 1,
            'usuario_modificacion' => 1,
        ]);

        $PRE = Departamento::create([
            'pais_id' => 1,
            'descripcion' => 'PRESIDENTE HAYES',
            'estado_id' => 1,
            'usuario_alta' => 1,
            'usuario_modificacion' => 1,
        ]);

        $PRE->ciudad()->create([
            'pais_id' => 1,
            'descripcion' => 'SIN ESPECIFICAR',
            'estado_id' => 1,
            'usuario_alta' => 1,
            'usuario_modificacion' => 1,
        ]);

        $BO = Departamento::create([
            'pais_id' => 1,
            'descripcion' => 'BOQUERON',
            'estado_id' => 1,
            'usuario_alta' => 1,
            'usuario_modificacion' => 1,
        ]);

        $BO->ciudad()->create([
            'pais_id' => 1,
            'descripcion' => 'SIN ESPECIFICAR',
            'estado_id' => 1,
            'usuario_alta' => 1,
            'usuario_modificacion' => 1,
        ]);

        $ALTO = Departamento::create([
            'pais_id' => 1,
            'descripcion' => 'ALTO PARAGUAY',
            'estado_id' => 1,
            'usuario_alta' => 1,
            'usuario_modificacion' => 1,
        ]);

        $ALTO->ciudad()->create([
            'pais_id' => 1,
            'descripcion' => 'SIN ESPECIFICAR',
            'estado_id' => 1,
            'usuario_alta' => 1,
            'usuario_modificacion' => 1,
        ]);
    }
}
