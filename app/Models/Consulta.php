<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    use HasFactory;

    protected $table = 'consulta';

    protected $guarded = [];

    public function paciente(){
        return $this->belongsTo(Paciente::class, 'paciente_id');
    }

    public function doctor_turno()
    {
        return $this->belongsTo(Doctor_Turno::class, 'doctor_turno_id');
    }

    public function estudios()
    {
        return $this->hasMany(OrdenEstudio::class, 'consulta_id');
    }
}
