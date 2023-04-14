<?php

namespace App\Http\Livewire\AgendaConsulta;

use App\Models\Doctor;
use App\Models\Doctor_Turno;
use App\Models\Especialidad;
use App\Models\Paciente;
use App\Models\Persona;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CreateConsulta extends Component
{
    public $especialidad_id, $fecha, $doctor, $paciente_id, $paciente_nombre, $documento_paciente, $limite_atencion
    , $error_persona, $dia, $error_fecha, $doctor_id, $turno_id, $detalles_doctor;

    public $documento, $nombre, $apellido, $fecha_nacimiento, $direccion, $barrio, $sexo, $celular;
    protected $listeners = ['buscar_persona', 'doctor_disponible', 'resetUI', 'save', 'cargar_combo'];

    protected $rules = [
        'documento' => 'required|unique:persona,documento',
        'nombre' => 'required',
        'apellido' => 'required',
        'fecha_nacimiento' => 'required',
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

        if((!empty($this->turno_id))){
            $ver = Doctor_Turno::find($this->turno_id);
            $this->detalles_doctor  = 'Desde ' . date('H:i', strtotime($ver->hora_desde)) . ' a ' . date('H:i', strtotime($ver->hora_hasta)) .' con un limite de personas de: ' . $this->limite_atencion;
            $this->cargar_combo();
        }
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
        $this->emit('reloadClassCSs');
    }

    public function doctor_disponible()
    {
        $fecha_actual =Carbon::now();
        $fecha_actual = $fecha_actual->format('Y-m-d');
        if($this->fecha < $fecha_actual){
            $this->error_fecha = 'Debe elegir una mayor o igual a la fecha actual!';
        }else{
            $this->cargar_combo();
            foreach($this->doctor AS $item){
                if ($item->cont < $this->limite_atencion){
                    $this->turno_id = $item->id;
                    break;
                }
            }

            $ver = Doctor_Turno::find($this->turno_id);
            $this->detalles_doctor  = 'Desde ' . date('H:i', strtotime($ver->hora_desde)) . ' a ' . date('H:i', strtotime($ver->hora_hasta)) .' con un limite de personas de: ' . $this->limite_atencion;

            $this->error_fecha = '';
            $this->emit('reloadClassCSs');
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
        // dd("que pdo");
        $this->validate();
        $persona = Persona::create([
            'documento' => $this->documento,
            'nombre' => $this->nombre,
            'apellido' => $this->apellido,
            'sexo' => $this->sexo,
            'fecha_nacimiento' => $this->fecha_nacimiento,
            'pais_id' => 1,
            'departamento_id' => 1,
            'ciudad_id' => 1,
            'estado_civil_id' => 1,
            'barrio' => $this->barrio,
            'direccion' => $this->direccion,
            'celular' => $this->celular,
            'direccion_laboral' => '',
            'telefono_laboral' => '',
            'fallecido' => 0,
            'motivo_inactivo' => '',
            'estado_id' => 1,
            'usuario_alta' => auth()->user()->id,
            'usuario_modificacion' => auth()->user()->id,
        ]);

        $paciente = Paciente::create([
            'persona_id' => $persona->id,
            'estatura' => '0',
            'peso' => 0,
            'estado_id' => 1,
            'usuario_alta' => auth()->user()->id,
            'usuario_modificacion' => auth()->user()->id,
        ]);
        $this->paciente_id = $paciente->id;
        $this->documento_paciente = $persona->documento;
        $this->paciente_nombre = $persona->nombre . ' ' . $persona->apellido;
        $this->resetUI();
        $this->emit('persona-add', 'Paciente Agregado');
    }

    public function resetUI()
    {
        $this->reset('documento');
        $this->reset('nombre');
        $this->reset('apellido');
        $this->reset('sexo');
        $this->reset('fecha_nacimiento');
        $this->reset('direccion');
        $this->reset('barrio');
        $this->reset('celular');
        $this->emit('reloadClassCSs');
    }

    public function cargar_combo()
    {
        $this->saber_dia();
        $this->doctor = Doctor_Turno::select('doctor_turno.*'
        , DB::raw('(
            SELECT
                COUNT(z.paciente_id)
            FROM agenda_consulta AS z
            WHERE CAST(z.fecha_consulta AS DATE) = CAST("'.$this->fecha.'" AS DATE)
            AND z.doctor_turno_id = doctor_turno.id
            AND z.estado_id = 1) AS cont'))
        ->where('estado_id', 1)
        ->where('dia', $this->dia)
        ->where('especialidad_id', $this->especialidad_id)
        ->get();
    }

}
