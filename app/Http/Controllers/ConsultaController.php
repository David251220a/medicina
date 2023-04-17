<?php

namespace App\Http\Controllers;

use App\Models\AgendaConsulta;
use App\Models\Doctor;
use App\Models\Doctor_Turno;
use App\Models\Persona;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConsultaController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:consulta.index')->only('index');
    }

    public function index(Request $request)
    {
        $doctor = (empty($request->doctor) ? 'n' : $request->doctor);
        $search = str_replace('.', '',$request->search);
        $fecha = $request->fecha;

        $doctores = Doctor::where('estado_id', 1)->get();
        if($request->fecha){
            $fecha = $request->fecha;
            // if(Carbon::now() > $fecha ){
            //     $fecha = Carbon::now();
            //     $fecha = date('Y-m-d', strtotime($fecha));
            // }
        }else{
            $fecha = Carbon::now();
            $fecha = date('Y-m-d', strtotime($fecha));
        }
        // dd($request->doctor);
        if($doctor != 'n')  {
            $dia = $this->saber_dia_paramentros($fecha);
            $turno_id = Doctor_Turno::where('doctor_id', $doctor)
            ->where('estado_id', 1)->get();

            $resultado = $turno_id->where('dia', $dia['dia'])->first();
            if($resultado){
                $persona = Persona::where('documento', $search)->first();
                if($persona){
                    $data = AgendaConsulta::where('estado_id', 1)
                    ->where(DB::raw('CAST(fecha_consulta AS DATE)'), $fecha)
                    ->where('paciente_id', $persona->paciente->id)
                    ->where('doctor_turno_id', $resultado->id)
                    ->get();
                }else{
                    $data = AgendaConsulta::where('estado_id', 1)
                    ->where(DB::raw('CAST(fecha_consulta AS DATE)'), $fecha)
                    ->where('doctor_turno_id', $resultado->id)
                    ->get();
                }

            }else{
                $data = [];
            }
            $doctor = $request->doctor;
        }else{
            if($request->search){
                $persona = Persona::where('documento', $search)->first();
                if($persona){
                    $data = AgendaConsulta::where('estado_id', 1)
                    ->where(DB::raw('CAST(fecha_consulta AS DATE)'), $fecha)
                    ->where('paciente_id', $persona->paciente->id)
                    ->get();
                }else{
                    $data = [];
                }
            }else{
                $data = AgendaConsulta::where('estado_id', 1)
                ->where(DB::raw('CAST(fecha_consulta AS DATE)'), $fecha)
                ->get();
            }

            $doctor = 'n';
        }
        return view('consulta.index', compact('doctores', 'fecha', 'search', 'data', 'doctor'));
    }
}
