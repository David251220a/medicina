<?php

namespace App\Http\Livewire\Persona;

use App\Models\Ciudad;
use App\Models\Departamento;
use App\Models\Pais;
use Livewire\Component;

class CreatePersona extends Component
{
    public $pais_id, $departamento_id, $ciudad_id;

    public function render()
    {
        $pais = Pais::all();

        if(empty($this->pais_id)){
            $this->pais_id = 1;
        }

        $departamento = Departamento::where('pais_id', $this->pais_id)->get();
        if($departamento->count() > 0){
            $this->departamento_id = $departamento[0]->id;
        }else{
            $this->departamento_id = 0;
        }
        $ciudad = Ciudad::where('pais_id', $this->pais_id)
        ->where('departamento_id', $this->departamento_id)
        ->get();

        return view('livewire.persona.create-persona', compact('pais', 'departamento', 'ciudad'));
    }
}
