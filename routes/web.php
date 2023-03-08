<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\EspecialidadController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\PersonaController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/logout', [LoginController::class, 'logout']);

Route::group([
    'middleware' => 'auth',
], function(){
    Route::get('/home', [InicioController::class, 'index'])->name('home');
    Route::resource('/personas', PersonaController::class)->names('persona');
    Route::resource('/pacientes', PacienteController::class)->names('paciente');
    Route::resource('/doctors', DoctorController::class)->names('doctor');
    Route::resource('/especialidads', EspecialidadController::class)->names('especialidad');

    Route::get('/doctors/espacialidad/{doctor}', [DoctorController::class, 'asignar_especialidad'])->name('doctor.asignar_especialidad');
    Route::post('/doctors/espacialidad/{doctor}', [DoctorController::class, 'asignar_especialidad_store'])->name('doctor.asignar_especialidad_store');
});

