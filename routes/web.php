<?php

use App\Http\Controllers\AgendaConsultaController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\DoctorConsultaController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\EspecialidadController;
use App\Http\Controllers\GrupoUsuarioController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\LimpiarController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\WwwController;
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

Route::get('/', [WwwController::class, 'index'])->name('w_inicio');
Route::get('/nosotros', [WwwController::class, 'sobre_nosotros'])->name('w_sobre_nosotros');
Route::get('/servicios', [WwwController::class, 'servicios'])->name('w_servicios');
Route::get('/contacto', [WwwController::class, 'contacto'])->name('w_contacto');
Route::get('/limpiar', [LimpiarController::class, 'limpiar'])->name('limpiar');
Route::get('/conectar', [LimpiarController::class, 'conectar'])->name('conectar');

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
    Route::resource('/users', UsuarioController::class)->names('user');
    Route::resource('/roles', GrupoUsuarioController::class)->names('role');

    Route::get('/doctors/espacialidad/{doctor}', [DoctorController::class, 'asignar_especialidad'])->name('doctor.asignar_especialidad');
    Route::post('/doctors/espacialidad/{doctor}', [DoctorController::class, 'asignar_especialidad_store'])->name('doctor.asignar_especialidad_store');

    Route::get('/agenda/consulta', [AgendaConsultaController::class, 'index'])->name('agenda_consulta.index');
    Route::get('/agenda/consulta/{especialidad}/especialidad', [AgendaConsultaController::class, 'especialidad'])->name('agenda_consulta.especialidad');
    Route::post('/agenda/consulta/{especialidad}/especialidad', [AgendaConsultaController::class, 'especialidad_store'])->name('agenda_consulta.especialidad_store');
    Route::get('/agendado/{agendaConsulta}', [AgendaConsultaController::class, 'agendado'])->name('agenda_consulta.agendado');

    Route::get('/doctor/consulta', [DoctorConsultaController::class, 'index'])->name('doctor_consulta.index');
    Route::get('/doctor/consulta/{agenda_consulta}/paciente', [DoctorConsultaController::class, 'atender'])->name('doctor_consulta.atender');
    Route::post('/doctor/consulta/edit/estado', [DoctorConsultaController::class, 'editar_estado'])->name('doctor_consulta.editar_estado');
    Route::post('/doctor/consulta/paciente', [DoctorConsultaController::class, 'store'])->name('doctor_consulta.store');
    Route::get('/doctor/consulta/{consulta}/atendido', [DoctorConsultaController::class, 'atendido'])->name('doctor_consulta.atendido');

    Route::get('/consulta/general', [ConsultaController::class, 'index'])->name('consulta.index');

    Route::get('/personas/users/actualizar', [PersonaController::class, 'edit_user'])->name('persona.edit_user');
    Route::post('/personas/users/actualizar', [PersonaController::class, 'edit_user_store'])->name('persona.edit_user_store');

    Route::get('/agendar', [InicioController::class, 'agendar'])->name('home.agendar');
    Route::get('/agendar/cita/{especialidad}', [InicioController::class, 'agendar_cita'])->name('home.agendar_cita');
    Route::post('/agendar/cita/{especialidad}', [InicioController::class, 'agendar_cita_store'])->name('home.agendar_cita_store');
    Route::get('/cita/agenda/{agendaConsulta}', [InicioController::class, 'cita_agendada'])->name('home.cita_agendada');
    Route::get('/home/consulta/{consulta}/atendido', [InicioController::class, 'atendido'])->name('home.atendido');
});

