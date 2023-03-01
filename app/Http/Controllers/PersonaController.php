<?php

namespace App\Http\Controllers;

use App\Models\Estado_Civil;
use App\Models\Persona;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

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
        $data = $request->all();

        if($data['fallecido'] == 'on'){
            $data['fallecido'] = 1;
        }else{
            $data['fallecido'] = 0;
        }
        $data['usuario_alta'] = auth()->user()->id;
        $data['usuario_modificacion'] = auth()->user()->id;
        Persona::create($data);
        return redirect()->route('persona.index');
    }
}
