<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor_Turno extends Model
{
    use HasFactory;

    protected $table = 'doctor_turno';

    protected $guarded = [];

    public function doctor(){
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }

    public function especialidad(){
        return $this->belongsTo(Especialidad::class, 'especialidad_id');
    }
}
