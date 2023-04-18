<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LimpiarController extends Controller
{
    public function limpiar()
    {
        \Artisan::call('config:clear');
        \Artisan::call('config:cache');
        \Artisan::call('cache:clear');
        \Artisan::call('route:clear');
    }

    public function conectar()
    {
        \Artisan::call('config:clear');
        \Artisan::call('config:cache');
        \Artisan::call('cache:clear');
        \Artisan::call('route:clear');
    }
}
