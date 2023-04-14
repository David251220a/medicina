@extends('layouts.admin')

@section('styles')
    <link href="{{asset('plugins/animate/animate.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

    <div class="layout-px-spacing mt-4">
        <div class="card component-card_1">
            <div class="card-body">
                <h3 class="card-title">Agendado con Exito!</h3>
                <p class="card-text">
                    Paciente: <b>{{number_format($agendaConsulta->paciente->persona->documento, 0, '.', '.')}} -
                    {{$agendaConsulta->paciente->persona->nombre}} {{$agendaConsulta->paciente->persona->apellido}}</b>
                    <br>
                    Especialista: <b>{{$agendaConsulta->doctor_turno->doctor->especialista->descripcion}}</b>
                    <br>
                    Doctor: <b>{{$agendaConsulta->doctor_turno->doctor->persona->nombre}} {{$agendaConsulta->doctor_turno->doctor->persona->apellido}}</b>
                    <br>
                    Fecha Consulta: <b>{{date('d/m/Y', strtotime($agendaConsulta->fecha_consulta))}}</b>
                    <br>
                    Orden: <b>{{$agendaConsulta->orden}}</b>
                </p>
                <a class="btn btn-info" href="{{route('agenda_consulta.index')}}">Regresar al Menu de Agenda!</a>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script src="{{asset('assets/js/forms/bootstrap_validation/bs_validation_script.js')}}"></script>
    <script src="{{asset('js/agenda_consulta/agendar.js')}}"></script>
@endsection
