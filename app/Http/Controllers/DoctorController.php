<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Doctor_Turno;
use App\Models\Especialidad;
use App\Models\Estado_Civil;
use App\Models\Persona;
use Illuminate\Http\Request;

class DoctorController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:doctor.index')->only('index');
        $this->middleware('permission:doctor.create')->only('create');
        $this->middleware('permission:doctor.store')->only('store');
        $this->middleware('permission:doctor.asignar_especialidad')->only('asignar_especialidad');
        $this->middleware('permission:doctor.asignar_especialidad_store')->only('asignar_especialidad_store');
    }

    public function index(Request $request)
    {
        $search= str_replace('.', '', $request->search);
        if ($request->search){
            $data = Doctor::join('persona as a', 'doctor.persona_id', '=', 'a.id')
            ->select('a.id','a.documento', 'a.nombre', 'a.apellido', 'a.sexo', 'a.celular', 'doctor.persona_id', 'doctor.estado_id', 'doctor.id AS doctor_id', 'doctor.especialidad_id')
            ->where('a.documento', $search)
            ->orderBy('a.documento', 'ASC')
            ->get();
        }else{
            $data = Doctor::join('persona as a', 'doctor.persona_id', '=', 'a.id')
            ->select('a.id','a.documento', 'a.nombre', 'a.apellido', 'a.sexo', 'a.celular', 'doctor.persona_id', 'doctor.estado_id', 'doctor.id AS doctor_id', 'doctor.especialidad_id')
            ->orderBy('a.documento', 'ASC')
            ->get();
        }

        return view('doctor.index', compact('search', 'data'));
    }

    public function create()
    {
        $estado_civil = Estado_Civil::all();
        return view('doctor.create', compact('estado_civil'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'documento' => 'required|max:15',
            'nombre' => 'required',
            'apellido'=>'required',
            'fecha_nacimiento'=>'required',
            'direccion'=>'required',
            'barrio'=>'required',
        ]);

        $documento = $request->documento;
        $_persona = Persona::where('documento', $documento)
        ->first();
        if (empty($_persona)){
            $data = $request->all();
            $data['usuario_alta'] = auth()->user()->id;
            $data['usuario_modificacion'] = auth()->user()->id;
            $persona = Persona::create($data);
            $doctor = $persona->doctor()->create([
                'estado_id' => 1,
                'limite_atencion' => '0',
                'especialidad_id' => 1,
                'usuario_alta' => auth()->user()->id,
                'usuario_modificacion' => auth()->user()->id,
            ]);

        }else{
            $_doctor = Doctor::where('persona_id', $_persona->id)->first();
            if((empty($_doctor))){
                $doctor = $_persona->doctor()->create([
                    'estado_id' => 1,
                    'limite_atencion' => '0',
                    'especialidad_id' => 1,
                    'usuario_alta' => auth()->user()->id,
                    'usuario_modificacion' => auth()->user()->id,
                ]);
            }else{
                return redirect()->back()->withInput()->withErrors('Ya existe doctor!.');
            }

        }

        return redirect()->route('doctor.asignar_especialidad', $doctor);
    }

    public function asignar_especialidad(Doctor $doctor)
    {
        $especialidad = Especialidad::where('estado_id', 1)->orderBy('descripcion', 'ASC')->get();
        $dias = $this->saber_dia();
        return view('doctor.especialidad', compact('doctor', 'especialidad', 'dias'));
    }

    public function asignar_especialidad_store(Doctor $doctor, Request $request)
    {

        $doctor->update([
            'especialidad_id' => $request->especialidad_id,
            'usuario_modificacion' => auth()->user()->id,
        ]);
        $dias = $request->dias;
        $hora_desde = $request->hora_desde;
        $hora_hasta = $request->hora_hasta;

        $turnos = Doctor_Turno::where('doctor_id', $doctor->id)->get();
        foreach($turnos as $item){
            $item->update([
                'estado_id' => 2,
            ]);
        }

        for ($i=0; $i < count($dias); $i++) {
            Doctor_Turno::updateOrCreate([
                'doctor_id' => $doctor->id,
                'dia' => $dias[$i],
            ]
            , [
                'doctor_id' => $doctor->id,
                'especialidad_id' => $request->especialidad_id,
                'dia'  => $dias[$i],
                'hora_desde' => $hora_desde[$i],
                'hora_hasta' => $hora_hasta[$i],
                'estado_id' => 1,
                'usuario_alta' => auth()->user()->id,
                'usuario_modificacion' => auth()->user()->id,
            ]);
        }

        return redirect()->route('doctor.index')->with('message', 'Se ha asignado el horario con exito!.');
    }
}
