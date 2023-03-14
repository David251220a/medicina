<?php

namespace App\Http\Controllers;

use App\Models\AgendaConsulta;
use App\Models\AgendaEstudio;
use App\Models\EstadoConsulta;
use App\Models\Persona;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoctorConsultaController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();
        $fecha_actual = Carbon::now();
        if($user->can('doctor')){
            $doctor = Persona::where('documento', $user->documento)->first();
            $doctor = $doctor->doctor;

            $data = AgendaConsulta::join('doctor_turno as a', 'agenda_consulta.doctor_turno_id', '=', 'a.id')
            ->select('agenda_consulta.*', 'a.doctor_id')
            ->where(DB::raw('CAST(agenda_consulta.fecha_consulta AS DATE)'), $fecha_actual->format('Y-m-d'))
            ->where('agenda_consulta.estado_id', 1)
            ->where('a.doctor_id', $doctor->id)
            ->orderBy('agenda_consulta.orden', 'ASC')
            ->paginate(30);

        }else{
            // $data = AgendaConsulta::where('CAST(fecha_consulta)', $fecha_actual)
            // ->where('estado_id', 1)
            // ->where('estado_consulta_id', 1)
            // ->paginate(30);
        }
        return view('doctor_consulta.index', compact('data', 'doctor'));
    }

    public function atender(AgendaConsulta $agendaConsulta)
    {
        $user = auth()->user();
        $doctor = Persona::where('documento', $user->documento)->first();
        $doctor = $doctor->doctor;
        $estado_consulta = EstadoConsulta::all();

        return view('doctor_consulta.atender', compact('agendaConsulta', 'doctor', 'estado_consulta'));
    }
}
