<?php

namespace App\Http\Livewire\Pais;

use App\Models\Pais;
use Livewire\Component;

class PaisCreate extends Component
{
    public $nombre;

    protected $rules = [
        'nombre' => 'required',
    ];

    public function render()
    {
        return view('livewire.pais.pais-create');
    }

    public function save()
    {
        $this->validate();

        Pais::create([
            'descripcion' => $this->nombre,
            'estado_id' => 1,
            'usuario_alta' => auth()->user()->id,
            'usuario_modificacion' => auth()->user()->id,
        ]);

        $this->reset('nombre');
        $this->emit('pais-add', 'Pais Agregado');
    }

    public function resetUI()
    {
        $this->reset('nombre');
        $this->emit('reloadClassCSs');
    }
}
