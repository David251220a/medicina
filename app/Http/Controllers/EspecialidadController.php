<?php

namespace App\Http\Controllers;

use App\Models\Especialidad;
use Illuminate\Http\Request;

class EspecialidadController extends Controller
{
    public function index(Request $request)
    {
        $search = "";
        if ($search){
            $search = $request->search;
            $data = Especialidad::where('descripcion','LIKE',  '%' . $search . '%', 'LIKE')
            ->where('estado_id', 1)
            ->orderBy('descripcion', 'ASC')
            ->get();
        }else{
            $data = Especialidad::orderBy('descripcion', 'ASC')
            ->where('estado_id', 1)
            ->get();
        }
        return view('especialidad.index', compact('search', 'data'));
    }

    public function create()
    {
        return view('especialidad.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required|unique:especialidad,descripcion',
            'foto' => 'mimes:jpeg,png,jpg,jpeg'
        ]);

        $data = $request->all();
        $data['usuario_alta'] = auth()->user()->id;
        $data['usuario_modificacion'] = auth()->user()->id;

        if($request->file('foto')){
            $filePath = $request->file('foto')->store('public/especialidad');
            $data['foto'] = $filePath;
        }else{
            $data['foto'] = 'no hay';
        }

        Especialidad::create($data);

        return redirect()->route('especialidad.index')->with('message', 'Se creo con exito!.');
    }

    public function edit(Especialidad $especialidad)
    {
        return view('especialidad.edit', compact('especialidad'));
    }

    public function update(Especialidad $especialidad, Request $request)
    {
        $request->validate([
            'descripcion' => 'required|unique:especialidad,descripcion,'.$especialidad->id .',id',
            'foto' => 'mimes:jpeg,png,jpg,jpeg'
        ]);

        $data = $request->all();
        $data['usuario_modificacion'] = auth()->user()->id;

        if($request->file('foto')){
            $filePath = $request->file('foto')->store('public/especialidad');
            $data['foto'] = $filePath;
        }

        $especialidad->update($data);

        return redirect()->route('especialidad.index')->with('message', 'Se actualizo con exito!.');
    }
}
