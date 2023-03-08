<?php

namespace App\Http\Livewire\Persona;

use App\Models\Ciudad;
use App\Models\Departamento;
use App\Models\Pais;
use App\Models\Persona;
use Livewire\Component;

class EditarPersona extends Component
{
    public $pais_id, $departamento_id = 0, $ciudad_id = 0, $descripcion_pais, $descripcion_departamento, $descripcion_ciudad;
    public $pais = [], $departamento = [], $ciudad = [];
    public $nombre_pais, $nombre_departamento, $persona;

    protected $listeners = ['updatedPais', 'updatedDepartamento', 'nombres'];

    protected $rules = [
        'descripcion_pais' => 'required||unique:pais,descripcion',
    ];

    public function mount(Persona $persona)
    {
        $this->persona = $persona;
        $this->pais = Pais::all();
        if(empty($this->pais_id)){
            $this->pais_id = $persona->pais_id;
        }

        $this->departamento = Departamento::where('pais_id', $this->pais_id)->get();
        if($this->departamento->count() > 0){
            if(empty($this->departamento_id)){
                $this->departamento_id = $persona->departamento_id;
            }else{
                $this->departamento_id = $this->departamento[0]->id;
            }

        }else{
            $this->departamento_id = 0;
        }

        $this->ciudad = Ciudad::where('pais_id', $this->pais_id)
        ->where('departamento_id', $this->departamento_id)
        ->get();

        if($this->ciudad->count() > 0){
            if(empty($this->ciudad_id)){
                $this->ciudad_id = $persona->ciudad_id;
            }else{
                $this->ciudad_id = $this->ciudad[0]->id;
            }
        }else{
            $this->ciudad_id = 0;
        }

        $this->nombres();
    }

    public function updatedPais(){
        $this->departamento = Departamento::where('pais_id', $this->pais_id)->get();
        if($this->departamento->count() > 0){
            $this->departamento_id = $this->departamento[0]->id;
        }else{
            $this->departamento_id = 0;
        }

        $this->ciudad = Ciudad::where('pais_id', $this->pais_id)
        ->where('departamento_id', $this->departamento_id)
        ->get();

        if($this->ciudad->count() > 0){
            $this->ciudad_id = $this->ciudad[0]->id;
        }else{
            $this->ciudad_id = 0;
        }
        $this->nombres();
    }

    public function updatedDepartamento(){
        $this->ciudad = Ciudad::where('pais_id', $this->pais_id)
        ->where('departamento_id', $this->departamento_id)
        ->get();

        if($this->ciudad->count() > 0){
            $this->ciudad_id = $this->ciudad[0]->id;
        }else{
            $this->ciudad_id = 0;
        }
        $this->nombres();
    }

    public function render()
    {
        return view('livewire.persona.editar-persona');
    }

    public function save()
    {
        $this->validate();

        $pais_a= Pais::create([
            'descripcion' => $this->descripcion_pais,
            'estado_id' => 1,
            'usuario_alta' => auth()->user()->id,
            'usuario_modificacion' => auth()->user()->id,
        ]);

        $dep= $pais_a->departamento()->create([
            'descripcion' => 'SIN ESPECIFICAR',
            'estado_id' => 1,
            'usuario_alta' => auth()->user()->id,
            'usuario_modificacion' => auth()->user()->id,
        ]);

        $dep->ciudad()->create([
            'pais_id' => $pais_a->id,
            'descripcion' => 'SIN ESPECIFICAR',
            'estado_id' => 1,
            'usuario_alta' => auth()->user()->id,
            'usuario_modificacion' => auth()->user()->id,
        ]);

        $this->mount($this->persona);
        $this->reset('descripcion_pais');
        $this->emit('pais-add', 'Pais Agregado');
    }

    public function save_departamento(){

        if(empty($this->descripcion_departamento)){
            $this->emit('departamento-error', 'El nombre del departamento no puede ser vacio!.');
            return false;
        }

        $existe_departamento = Departamento::where('pais_id', $this->pais_id)
        ->where('descripcion', '=', $this->descripcion_departamento)
        ->first();

        if(!(empty($existe_departamento))){
            $this->emit('departamento-error', 'Ya existe departamento con este nombre, dentro de este pais!.');
            return false;
        }

        $dep = Departamento::create([
            'pais_id' => $this->pais_id,
            'descripcion' => $this->descripcion_departamento,
            'estado_id' => 1,
            'usuario_alta' => auth()->user()->id,
            'usuario_modificacion' => auth()->user()->id,
        ]);

        $dep->ciudad()->create([
            'pais_id' => $this->pais_id,
            'descripcion' => 'SIN ESPECIFICAR',
            'estado_id' => 1,
            'usuario_alta' => auth()->user()->id,
            'usuario_modificacion' => auth()->user()->id,
        ]);


        $this->updatedPais();
        $this->reset('descripcion_departamento');
        $this->emit('departamento-add', 'Departamento Agregado');

    }

    public function save_ciudad(){

        if(empty($this->descripcion_ciudad)){
            $this->emit('ciudad-error', 'El nombre de la ciudad no puede ser vacio!.');
            return false;
        }

        $existe_ciudad = Ciudad::where('pais_id', $this->pais_id)
        ->where('departamento_id', $this->departamento_id)
        ->where('descripcion', '=', $this->descripcion_ciudad)->first();

        if(!(empty($existe_ciudad))){
            $this->emit('ciudad-error', 'El nombre de la ciudad ya existe!.');
            return false;
        }

        Ciudad::create([
            'pais_id' => $this->pais_id,
            'departamento_id' => $this->departamento_id,
            'descripcion' => $this->descripcion_ciudad,
            'estado_id' => 1,
            'usuario_alta' => auth()->user()->id,
            'usuario_modificacion' => auth()->user()->id,
        ]);

        $this->updatedDepartamento();
        $this->reset('descripcion_ciudad');
        $this->emit('ciudad-add', 'Ciudad Agregado');

    }

    public function nombres(){
        $_pais = Pais::find($this->pais_id);
        $_departamento = Departamento::find($this->departamento_id);
        $this->nombre_pais = $_pais->descripcion;
        if($_departamento){
            $this->nombre_departamento = $_departamento->descripcion;
        }else{
            $this->nombre_departamento = "";
        }

    }

    public function resetUI()
    {
        $this->reset('descripcion_pais');
        $this->reset('descripcion_departamento');
        $this->reset('descripcion_ciudad');
        $this->emit('reloadClassCSs');
    }

}
