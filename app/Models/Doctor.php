<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $table = 'doctor';

    protected $guarded = [];

    public function persona(){
        return $this->belongsTo(Persona::class, 'persona_id', 'id');
    }

    public function turnos(){
        return $this->hasMany(Doctor_Turno::class, 'doctor_id')->where('estado_id', 1)->orderBy('dia', 'ASC');
    }
}
