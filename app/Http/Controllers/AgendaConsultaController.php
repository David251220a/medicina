<?php

namespace App\Http\Controllers;

use App\Models\AgendaConsulta;
use App\Models\Especialidad;
use Illuminate\Http\Request;

class AgendaConsultaController extends Controller
{
    public function index(Request $request)
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

        return view('agenda_consulta.index', compact('search', 'especialidad'));
    }

    public function especialidad(Especialidad $especialidad)
    {
        return view('agenda_consulta.especialidad', compact('especialidad'));
    }

    public function especialidad_store(Especialidad $especialidad, Request $request)
    {
        $request->validate([
            'paciente_id' => 'required'
        ]);

        // $turno_doctor = Doctor_Turno::find($request->doctor_turno_id);
        $limite_atencion_agendado = AgendaConsulta::where('estado_id', 1)
        ->where('doctor_turno_id', $request->doctor_turno_id)
        ->where('fecha_consulta', $request->fecha_consulta)
        ->count();

        if($limite_atencion_agendado >= $especialidad->limite_atencion){
            return redirect()->back()->withInput()->withErrors('Lo sentimos ya se ha alcanzado el limite de atencion para este dia!.');
        }

        $orden = AgendaConsulta::where('estado_id', 1)
        ->where('doctor_turno_id', $request->doctor_turno_id)
        ->where('fecha_consulta', $request->fecha_consulta)
        ->max('orden');

        $orden = $orden + 1;

        $agenda = AgendaConsulta::create([
            'paciente_id' => $request->paciente_id,
            'doctor_turno_id' => $request->doctor_turno_id,
            'estado_consulta_id' => 1,
            'fecha_consulta' => $request->fecha_consulta,
            'orden' => $orden,
            'estado_id' => 1,
            'usuario_alta' => auth()->user()->id,
            'usuario_modificacion' => auth()->user()->id,
        ]);

        return redirect()->route('agenda_consulta.agendado', $agenda->id);
    }

    public function agendado(AgendaConsulta $agendaConsulta)
    {
        return view('agenda_consulta.agendado', compact('agendaConsulta'));
    }
}
