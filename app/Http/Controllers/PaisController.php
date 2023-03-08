<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaisController extends Controller
{
    public function index(Request $request)
    {
        return view('pais.index');
    }
}
