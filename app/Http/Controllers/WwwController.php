<?php

namespace App\Http\Controllers;

use App\Models\Especialidad;
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
}
