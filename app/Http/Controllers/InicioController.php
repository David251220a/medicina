<?php

namespace App\Http\Controllers;

use App\Models\AgendaConsulta;
use App\Models\Consulta;
use App\Models\Especialidad;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InicioController extends Controller
{

    public function index()
    {
        $user = auth()->user();
        $fecha = Carbon::now();
        $fecha = date('Y-m-d', strtotime($fecha));

        if($user->persona->paciente){
            $consultas = Consulta::where('estado_id', 1)
            ->where('paciente_id', $user->persona->paciente->id)
            ->orderBy('fecha_consulta', 'DESC')
            ->take(3);

            $agenda = AgendaConsulta::where('estado_id', 1)
            ->where('paciente_id', $user->persona->paciente->id)
            ->where(DB::raw('CAST(fecha_consulta AS DATE)'), '>=', $fecha)
            ->get();
        }else{
            $consultas = [];
            $agenda = [];
        }

        return view('home', compact('consultas', 'agenda'));
    }

    public function agendar(Request $request)
    {
        $search = "";
        if($request->search){
            $search = $request->search;
            $especialidad = Especialidad::where('estado_id', 1)
            ->where('descripcion', 'LIKE', '%'.$search.'%')
            ->orderBy('descripcion', 'ASC')
            ->get();
        }else{
            $especialidad = Especialidad::where('estado_id', 1)->orderBy('descripcion', 'ASC')->get();
        }

        return view('agendar', compact('search', 'especialidad'));
    }

    public function agendar_cita(Especialidad $especialidad)
    {
        return view('agendar_cita', compact('especialidad'));
    }
}
