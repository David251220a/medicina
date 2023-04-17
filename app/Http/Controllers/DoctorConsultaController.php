<?php

namespace App\Http\Controllers;

use App\Models\AgendaConsulta;
use App\Models\AgendaEstudio;
use App\Models\Consulta;
use App\Models\EstadoConsulta;
use App\Models\OrdenEstudio;
use App\Models\Paciente;
use App\Models\Persona;
use App\Models\TipoEstudio;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Return_;

class DoctorConsultaController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:doctor_consulta.index')->only('index');
        $this->middleware('permission:doctor_consulta.atender')->only('atender');
        $this->middleware('permission:doctor_consulta.store')->only('store');
        $this->middleware('permission:doctor_consulta.atendido')->only('atendido');
        $this->middleware('permission:doctor_consulta.editar_estado')->only('editar_estado');
    }

    public function index(Request $request)
    {
        $user = auth()->user();
        $fecha_actual = Carbon::now();

        $doctor = Persona::where('documento', $user->documento)->first();
        $doctor = $doctor->doctor;
        if(empty($doctor)){
            return redirect()->route('home');
        }
        $data = AgendaConsulta::join('doctor_turno as a', 'agenda_consulta.doctor_turno_id', '=', 'a.id')
        ->select('agenda_consulta.*', 'a.doctor_id')
        ->where(DB::raw('CAST(agenda_consulta.fecha_consulta AS DATE)'), $fecha_actual->format('Y-m-d'))
        ->where('agenda_consulta.estado_id', 1)
        ->where('a.doctor_id', $doctor->id)
        ->orderBy('agenda_consulta.orden', 'ASC')
        ->paginate(30);

        $estado_consulta = EstadoConsulta::where('estado_id', 1)->get();

        return view('doctor_consulta.index', compact('data', 'doctor', 'estado_consulta'));
    }

    public function atender(AgendaConsulta $agendaConsulta)
    {
        if($agendaConsulta->consulta){
            return redirect()->route('doctor_consulta.index')->withInput()->withErrors('Este paciente ya sido atendido');
        }
        $user = auth()->user();
        $doctor = Persona::where('documento', $user->documento)->first();
        $doctor = $doctor->doctor;
        $estado_consulta = EstadoConsulta::all();
        $tipo_estudio = TipoEstudio::where('estado_id', 1)->get();


        return view('doctor_consulta.atender', compact('agendaConsulta', 'doctor', 'estado_consulta', 'tipo_estudio'));
    }

    public function store(Request $request){
        $request->validate([
            'peso' => 'required',
            'altura' => 'required',
            'diagnostico' => 'required',
        ]);

        $consulta = Consulta::create([
            'paciente_id' => $request->paciente_id,
            'doctor_turno_id' => $request->doctor_turno_id,
            'agenda_id' => $request->agenda_id,
            'diagnostico' => $request->diagnostico,
            'instrucciones' => $request->instrucciones,
            'receta' => $request->receta,
            'reposo' => $request->reposo,
            'estatura' => $request->altura,
            'peso' => $request->peso,
            'fecha' => Carbon::now(),
            'estado_id' => 1,
            'usuario_alta' => auth()->user()->id,
            'usuario_modificacion' => auth()->user()->id,
        ]);

        $paciente = Paciente::find($request->paciente_id);
        $paciente->update([
            'peso' => $request->peso,
            'estatura' => $request->altura,
            'usuario_modificacion' => auth()->user()->id,
        ]);

        $tipo_estudio_orden = $request->tipo_estudio_orden;
        $descripcion_orden = $request->descripcion_orden;

        if(!(empty($tipo_estudio_orden))){
            for ($i = 0; $i < count($tipo_estudio_orden) ; $i++) {
                OrdenEstudio::create([
                    'paciente_id' => $request->paciente_id,
                    'doctor_id' => $request->doctor_id,
                    'tipo_estudio_id' => $tipo_estudio_orden[$i],
                    'consulta_id' => $consulta->id,
                    'observacion' => $descripcion_orden[$i],
                    'estado_id' => 1,
                    'usuario_alta' => auth()->user()->id,
                    'usuario_modificacion' => auth()->user()->id,
                ]);
            }
        }

        $agendaConsulta = AgendaConsulta::find($request->agenda_id);
        $agendaConsulta->update([
            'estado_consulta_id' => 2,
            'usuario_modificacion' => auth()->user()->id,
        ]);

        return redirect()->route('doctor_consulta.atendido', $consulta->id)->with('message', 'Consulta registrada con exito!.');

    }

    public function atendido(Consulta $consulta){
        return view('doctor_consulta.atendido', compact('consulta'));
    }

    public function editar_estado(Request $request)
    {
        $agenda_id = $request->agenda_id;
        $estado_consulta_id = $request->estado_consulta_id;
        $agenda = AgendaConsulta::find($agenda_id);
        if($agenda->estado_consulta_id == 2){
            $data['mensaje'] = 'No se puede actualizar un registro con estado FINALIZADO!.';
            $data['ok'] = 0;
            return response()->json($data);
        }

        $agenda->update([
            'estado_consulta_id' => $estado_consulta_id,
        ]);

        $estado_consulta = EstadoConsulta::find($estado_consulta_id);
        $data['mensaje'] = 'Actualizado con exito!.';
        $data['descripcion'] = $estado_consulta->descripcion;
        $data['ok'] = 1;
        return response()->json($data);
    }
}
