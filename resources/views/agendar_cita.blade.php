@extends('layouts.admin')

@section('styles')
    <link href="{{asset('plugins/animate/animate.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/components/custom-modal.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/sweetalerts/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/sweetalerts/sweetalert.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/components/custom-sweetalert.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

    <div class="layout-px-spacing">
        <div class="row">
            <div class="col-12">
                <h5 class="mt-3 mb-4">Agenda Consulta - {{$especialidad->descripcion}}</h5>
            </div>

        </div>

        <div class="col-lg-12 layout-spacing">
            <div class="widget-content widget-content-area">
                <form class="needs-validation" novalidate action="{{route('home.agendar_cita_store', $especialidad)}}" method="POST"
                enctype="multipart/form-data">
                @csrf
                    @livewire('home.agendar-cita', ['especialidad' => $especialidad], key($especialidad->id))

                    <button class="btn btn-primary mt-3" type="submit">Grabar</button>

                </form>

            </div>
        </div>
    </div>

@endsection

@section('js')
    <script src="{{asset('assets/js/forms/bootstrap_validation/bs_validation_script.js')}}"></script>
    <script src="{{asset('js/agenda_consulta/agendar.js')}}"></script>
    <script src="{{asset('plugins/sweetalerts/sweetalert2.min.js')}}"></script>
    <script src="{{asset('plugins/sweetalerts/custom-sweetalert.js')}}"></script>
@endsection
