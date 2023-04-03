<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdenEstudio extends Model
{
    use HasFactory;

    protected $table = 'orden_estudio';

    protected $guarded = [];

    public function tipo_estudio()
    {
        return $this->belongsTo(TipoEstudio::class, 'tipo_estudio_id');
    }
}
