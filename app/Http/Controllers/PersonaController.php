<?php

namespace App\Http\Controllers;

use App\Models\Estado_Civil;
use App\Models\Persona;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    public function index(Request $request)
    {
        $search = str_replace('.', '', $request->search);
        if($search){
            $data = Persona::where('documento', $search)
            ->orderBy('documento', 'ASC')
            ->get();
        }else{
            $data = Persona::orderBy('documento', 'ASC')
            ->get();
        }

        return view('persona.index', compact('data', 'search'));
    }

    public function create()
    {
        $estado_civil = Estado_Civil::all();
        return view('persona.create', compact('estado_civil'));
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

        $existe_persona = Persona::where('documento', $request->documento)
        ->first();

        if ($existe_persona){
            return redirect()->back()->withInput()->withErrors('Ya existe esta persona con este numero de cedula!.');
        }

        $data = $request->all();
        $data['usuario_alta'] = auth()->user()->id;
        $data['usuario_modificacion'] = auth()->user()->id;
        Persona::create($data);
        return redirect()->route('persona.index')->with('message', 'Se creo con exito!.');
    }

    public function edit(Persona $persona)
    {
        $estado_civil = Estado_Civil::all();
        return view('persona.edit', compact('persona', 'estado_civil'));
    }

    public function update(Persona $persona, Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido'=>'required',
            'fecha_nacimiento'=>'required',
            'direccion'=>'required',
            'barrio'=>'required',
        ]);

        $data = $request->all();
        $data['usuario_modificacion'] = auth()->user()->id;

        $persona->update($data);

        return redirect()->route('persona.edit', $persona)->with('message', 'Se actualizo con exito!.');
    }
}
