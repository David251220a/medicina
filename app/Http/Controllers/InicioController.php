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
            ->latest('fecha')->take(3)->get();

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

    public function agendar_cita_store(Especialidad $especialidad  , Request $request)
    {
        $request->validate([
            'fecha_consulta' => 'required',
            'doctor_turno_id' => 'required'
        ]);

        $limite_atencion_agendado = AgendaConsulta::where('estado_id', 1)
        ->where('doctor_turno_id', $request->doctor_turno_id)
        ->where(DB::raw('CAST(fecha_consulta AS DATE)'), $request->fecha_consulta)
        ->count();

        if($limite_atencion_agendado >= $especialidad->limite_atencion){
            return redirect()->back()->withInput()->withErrors('Lo sentimos ya se ha alcanzado el limite de atencion para este dia!.');
        }
        $paciente = auth()->user()->persona->paciente;
        $existe_agendado = AgendaConsulta::where('paciente_id', $paciente->id)
        ->where('doctor_turno_id', $request->doctor_turno_id)
        ->where('estado_id', 1)
        ->where(DB::raw('CAST(fecha_consulta AS DATE)'), $request->fecha_consulta)
        ->first();

        if($existe_agendado){
            return redirect()->back()->withInput()->withErrors('Esta persona ya esta agendado con este doctor en la misma fecha: '
            .date('d/m/Y', strtotime($request->fecha_consulta)) .'!.');
        }

        $orden = AgendaConsulta::where('estado_id', 1)
        ->where('doctor_turno_id', $request->doctor_turno_id)
        ->where(DB::raw('CAST(fecha_consulta AS DATE)'), $request->fecha_consulta)
        ->max('orden');

        $orden = $orden + 1;

        $agenda = AgendaConsulta::create([
            'paciente_id' => $paciente->id,
            'doctor_turno_id' => $request->doctor_turno_id,
            'estado_consulta_id' => 1,
            'fecha_consulta' => $request->fecha_consulta,
            'orden' => $orden,
            'estado_id' => 1,
            'usuario_alta' => auth()->user()->id,
            'usuario_modificacion' => auth()->user()->id,
        ]);

        return redirect()->route('home.cita_agendada', $agenda->id);
    }

    public function cita_agendada(AgendaConsulta $agendaConsulta)
    {
        return view('cita_agendada', compact('agendaConsulta'));
    }

    public function atendido(Consulta $consulta){
        return view('atendido', compact('consulta'));
    }
}
