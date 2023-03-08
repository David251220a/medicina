<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Especialidad;
use App\Models\Estado_Civil;
use App\Models\Persona;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index(Request $request)
    {
        $search= str_replace('.', '', $request->search);
        if ($request->search){
            $data = Doctor::join('persona as a', 'doctor.persona_id', '=', 'a.id')
            ->select('a.id','a.documento', 'a.nombre', 'a.apellido', 'a.sexo', 'a.celular', 'doctor.persona_id', 'doctor.estado_id', 'doctor.id AS doctor_id')
            ->where('a.documento', $search)
            ->orderBy('a.documento', 'ASC')
            ->get();
        }else{
            $data = Doctor::join('persona as a', 'doctor.persona_id', '=', 'a.id')
            ->select('a.id','a.documento', 'a.nombre', 'a.apellido', 'a.sexo', 'a.celular', 'doctor.persona_id', 'doctor.estado_id', 'doctor.id AS doctor_id')
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
}