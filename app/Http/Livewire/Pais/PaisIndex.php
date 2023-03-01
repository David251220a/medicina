<?php

namespace App\Http\Livewire\Pais;

use App\Models\Pais;
use Livewire\Component;
use Livewire\WithPagination;

class PaisIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['render', 'destroy'];

    public $descripcion, $search, $pagina, $titulo, $clave;

    public function mount()
    {
        $this->titulo = "Pais";
        $this->pagina = 5;
        $this->clave = 0;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        if(empty($this->search)){
            $data = Pais::where('estado_id', 1)->orderBy('id', 'DESC')->paginate($this->pagina);
        }else{
            $data = Pais::where('estado_id', 1)
            ->where('descripcion', 'LIKE', '%' . $this->search . '%')
            ->orderBy('id', 'DESC')
            ->paginate($this->pagina);
        }

        return view('livewire.pais.pais-index', compact('data'));
    }

    public function save()
    {
        $rules = [
            'descripcion' => "required|unique:sis_pais,descripcion",
        ];

        $this->validate($rules);

        Pais::create([
            'descripcion' => $this->descripcion,
            'estado_id' => 1,
            'usuario_alta' => auth()->user()->id,
            'usuario_modificacion' => auth()->user()->id,
        ]);

        $this->resetUI();
        $this->emit('pais-add', 'Pais Agregado');
    }

    public function editar(Pais $pais)
    {
        $this->descripcion = $pais->descripcion;
        $this->clave = $pais->id;
        $this->emit('editar', 'Editar Pais');
    }

    public function update()
    {
        $rules = [
            'descripcion' => "required|unique:sis_pais,descripcion,{$this->clave}",
        ];

        $this->validate($rules);

        $pais = Pais::find($this->clave);

        $pais->update([
            'descripcion' => $this->descripcion,
            'usuario_modificacion' => auth()->user()->id,
        ]);

        $this->resetUI();
        $this->emit('pais-upd', 'Pais Editar');
    }

    public function destroy(Pais $pais)
    {
        $pais->update([
            'estado_id' => 2,
            'usuario_modificacion' => auth()->user()->id,
        ]);

        $this->resetUI();
        $this->emit('pais-del', 'Pais Eliminado');
    }

    public function resetUI()
    {
        $this->reset('descripcion');
        $this->clave = 0;
        $this->emit('reloadClassCSs', 'Limpia');
    }
}
