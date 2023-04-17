<?php

namespace App\Http\Controllers;

use App\Models\Especialidad;
use App\Models\TipoEstudio;
use Illuminate\Http\Request;

class WwwController extends Controller
{
    public function index()
    {
        $servicios = Especialidad::where('estado_id', 1)
        ->take(6)
        ->get();
        return view('welcome', compact('servicios'));
    }

    public function sobre_nosotros()
    {
        return view('www.nosotros');
    }

    public function servicios()
    {
        $servicios = Especialidad::where('estado_id', 1)
        ->get();
        $estudios = TipoEstudio::where('estado_id', 1)->get();
        return view('www.servicios', compact('servicios', 'estudios'));
    }

    public function contacto()
    {
        return view('www.contact');
    }
}
