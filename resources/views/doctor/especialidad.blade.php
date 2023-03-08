@extends('layouts.admin')

@section('styles')

    <link rel="stylesheet" type="text/css" href="{{asset('plugins/select2/select2.min.css')}}">
    <link href="{{asset('assets/css/components/custom-modal.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/animate/animate.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/sweetalerts/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/sweetalerts/sweetalert.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/components/custom-sweetalert.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

    <div class="row layout-top-spacing">
        <div class="col-lg-12 layout-spacing">
            <div class="widget-content widget-content-area">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <h5>Doctor: <b>{{$doctor->persona->nombre}} {{$doctor->persona->apellido}}</b></h5>
                    </div>
                </div>
            </div>

            <h5 style="margin-top: 30px"><b>Asignar Especialidad</b></h5>
            <div class="widget-content widget-content-area" >
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <select class="form-control  basic">
                            @foreach ($especialidad as $item)
                                <option value="{{$item->id}}">{{$item->descripcion}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <h5 style="margin-top: 30px"><b>Asignar Horario</b></h5>
            <div class="widget-content widget-content-area" >
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                        <label for="">Día</label>
                        @include('ui.dias')
                    </div>

                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
                        <label for="">Hora Desde</label>
                        <input type="time" id="hora_desde" class="form-control">
                        <span id="mensaje_desde" class="red" style="display: none">Debe de completar este campo para asignar horario!.</span>
                    </div>

                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
                        <label for="">Hora Hasta</label>
                        <input type="time" id="hora_hasta" class="form-control">
                        <span id="mensaje_hasta" class="red" style="display: none">Debe de completar este campo para asignar horario!.</span>
                    </div>

                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
                        <button type="button" class="btn btn-info" onclick="agregar_fila()">Agregar</button>
                    </div>
                </div>
            </div>

            <h5 style="margin-top: 30px"><b>Horario</b></h5>
            <table id="zero-config" class="table dt-table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th>Día</th>
                        <th>Hora Entrada</th>
                        <th>Hora Salida</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="body_horario">

                </tbody>
            </table>

        </div>

    </div>

@endsection

@section('js')
    <script src="{{asset('plugins/sweetalerts/sweetalert2.min.js')}}"></script>
    <script src="{{asset('plugins/sweetalerts/custom-sweetalert.js')}}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!--  BEGIN CUSTOM SCRIPTS FILE  -->
    <script src="{{asset('assets/js/scrollspyNav.js')}}"></script>
    <script src="{{asset('js/doctor/doctor.js')}}"></script>
    <script src="{{asset('assets/js/forms/bootstrap_validation/bs_validation_script.js')}}"></script>
    <script src="{{asset('plugins/select2/select2.min.js')}}"></script>
    <script src="{{asset('plugins/select2/custom-select2.js')}}"></script>


@endsection
