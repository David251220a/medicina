<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    use HasFactory;

    protected $table="pais";

    protected $guarded = [];

    public function estado(){
        return $this->belongsTo(Estado::class, 'estado_id');
    }
}
