<?php

namespace App\Http\Livewire\AgendaConsulta;

use App\Models\Doctor_Turno;
use App\Models\Especialidad;
use App\Models\Persona;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CreateConsulta extends Component
{
    public $especialidad_id, $fecha, $doctor, $paciente_id, $paciente_nombre, $documento_paciente, $limite_atencion
    , $error_persona, $dia, $error_fecha, $doctor_id;

    public $documento, $nombre, $apellido, $fecha_nacimiento, $direccion, $barrio, $sexo;
    protected $listeners = ['buscar_persona', 'doctor_disponible'];

    protected $rules = [
        'documento' => 'required|unique:persona,documento',
        'nombre' => 'required',
        'apellido' => 'required',
        'sexo' => 'required',
        'direccion' => 'required',
        'barrio' => 'required'
    ];

    public function mount(Especialidad $especialidad)
    {
        $this->especialidad_id = $especialidad->id;
        $this->limite_atencion = $especialidad->limite_atencion;
        $this->doctor = [];
        $this->fecha =Carbon::now();
        $this->fecha = $this->fecha->format('Y-m-d');
    }

    public function render()
    {
        return view('livewire.agenda-consulta.create-consulta');
    }

    public function buscar_persona()
    {

        if($this->documento_paciente){
            $documento = str_replace('.','',$this->documento_paciente);
            $persona = Persona::where('documento', $documento)
            ->where('estado_id', 1)->first();

            if($persona){
                $this->paciente_id = $persona->paciente->id;
                $this->paciente_nombre = $persona->nombre . ' '. $persona->apellido;
                $this->error_persona = '';
            }else{
                $this->error_persona = 'No existe paciente con este numero de documento!';
                $this->paciente_nombre ='';
            }
        }else{
            $this->paciente_nombre ='';
        }
    }

    public function doctor_disponible()
    {
        $fecha_actual =Carbon::now();
        $fecha_actual = $fecha_actual->format('Y-m-d');
        if($this->fecha < $fecha_actual){
            $this->error_fecha = 'Debe elegir una mayor o igual a la fecha actual!';
        }else{
            $this->saber_dia();
            $this->doctor = Doctor_Turno::select('doctor_turno.*', DB::raw('(SELECT COUNT(z.persona_id) FROM agenda_consulta AS z WHERE z.fecha_consulta = '.$this->fecha.' AND z.doctor_turno_id = doctor_turno.id AND z.estado_id = 1) AS cont'))
            ->where('estado_id', 1)
            ->where('dia', $this->dia)
            ->where('especialidad_id', $this->especialidad_id)
            ->get();
            $this->error_fecha = '';
        }
    }

    public function saber_dia()
    {
        $day = date("l", strtotime($this->fecha));
        switch ($day) {
            case "Sunday":
                $this->dia = 1;
                break;
            case "Monday":
                $this->dia = 2;
                break;
            case "Tuesday":
                $this->dia = 3;
                break;
            case "Wednesday":
                $this->dia = 4;
            break;
            case "Thursday":
                $this->dia = 5;
                break;
            case "Friday":
                $this->dia = 6;
                break;
            case "Saturday":
                $this->dia = 7;
            break;
        }
    }

    public function save()
    {
        $this->validate();

    }

    public function resetUI()
    {
        $this->reset('descripcion_pais');
        $this->reset('descripcion_departamento');
        $this->reset('descripcion_ciudad');
        // $this->emit('reloadClassCSs');
    }

}
