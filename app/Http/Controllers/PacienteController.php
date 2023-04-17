<?php

namespace App\Http\Controllers;

use App\Models\Estado_Civil;
use App\Models\Paciente;
use App\Models\Persona;
use Illuminate\Http\Request;

class PacienteController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:paciente.index')->only('index');
        $this->middleware('permission:paciente.create')->only('create');
        $this->middleware('permission:paciente.store')->only('store');
    }

    public function index(Request $request)
    {
        $search= str_replace('.', '', $request->search);
        if ($request->search){
            $data = Paciente::join('persona as a', 'paciente.persona_id', '=', 'a.id')
            ->select('a.id','a.documento', 'a.nombre', 'a.apellido', 'a.fecha_nacimiento', 'a.celular', 'a.direccion', 'a.sexo'
            , 'paciente.estado_id')
            ->where('a.documento', $search)
            ->orderBy('a.documento')
            ->get();
        }else{
            $data = Paciente::join('persona as a', 'paciente.persona_id', '=', 'a.id')
            ->select('a.id', 'a.documento', 'a.nombre', 'a.apellido', 'a.fecha_nacimiento', 'a.celular', 'a.direccion', 'a.sexo'
            , 'paciente.estado_id')
            ->orderBy('a.documento')
            ->get();
        }
        return view('paciente.index', compact('search', 'data'));
    }

    public function create()
    {
        $estado_civil = Estado_Civil::all();
        return view('paciente.create', compact('estado_civil'));
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
            $persona->paciente()->create([
               'estado_id' => 1,
               'estatura' => '0',
               'peso' => 0,
               'usuario_alta' => auth()->user()->id,
               'usuario_modificacion' => auth()->user()->id,
            ]);

        }else{
            $_paciente = Paciente::where('persona_id', $_persona->id)->first();
            if((empty($_paciente))){
                $_persona->paciente()->create([
                    'estado_id' => 1,
                    'estatura' => '0',
                    'peso' => 0,
                    'usuario_alta' => auth()->user()->id,
                    'usuario_modificacion' => auth()->user()->id,
                ]);
            }else{
                return redirect()->back()->withInput()->withErrors('Ya existe paciente!.');
            }

        }

        return redirect()->route('paciente.index')->with('message', 'Se creo con existo el paciente!.');
    }


}
