<?php

namespace App\Http\Controllers;

use App\Models\AgendaConsulta;
use App\Models\Doctor;
use App\Models\Doctor_Turno;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ConsultaController extends Controller
{
    public function index(Request $request)
    {
        $doctor = $request->doctor;
        $search = str_replace('.', '',$request->search);
        $fecha = $request->fecha;

        $doctores = Doctor::where('estado_id', 1)->get();
        if($request->fecha){
            $fecha = $request->fecha;
        }else{
            $fecha = Carbon::now();
        }

        if($request->doctor){
            $data = AgendaConsulta::where('estado_id', 1)
            ->where('fecha_consulta', $request->fecha_consulta)
            ->get();
        }else{

            $dia = $this->saber_dia_paramentros($fecha);
            $turno_id = Doctor_Turno::where('doctor_id', $doctor)
            ->where('estado_id', 1)->get();

            $resultado = $turno_id->where('dia', $dia['dia']);

            if($resultado){
                $data = AgendaConsulta::where('estado_id', 1)
                ->where('fecha_consulta', $request->fecha_consulta)
                ->get();
            }else{
                $data = [];
            }

        }
        return view('consulta.index', compact('doctores', 'fecha', 'search', 'data'));
    }
}
