<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgendaConsulta extends Model
{
    use HasFactory;

    protected $table = 'agenda_consulta';

    protected $guarded = [];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'paciente_id', 'id');
    }

    public function doctor_turno()
    {
        return $this->belongsTo(Doctor_Turno::class, 'doctor_turno_id');
    }

}
