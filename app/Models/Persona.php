<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    protected $table = 'persona';

    protected $guarded = [];

    public function paciente(){
        return $this->hasOne(Paciente::class, 'persona_id');
    }

    public function doctor(){
        return $this->hasOne(Doctor::class, 'persona_id');
    }
}
