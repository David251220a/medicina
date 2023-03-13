@extends('layouts.admin')

@section('styles')
    <link href="{{asset('plugins/sweetalerts/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/sweetalerts/sweetalert.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/components/custom-sweetalert.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/elements/search.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/datatables.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/dt-global_style.css')}}">
    <link href="assets/css/elements/popover.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')

    <div class="layout-px-spacing">
        <div class="row" style="margin-top: 15px">
            <div class="col-lg-4 col-md-12 col-sm-12 mb-2" style="line-height: 12px">
                <p style="font-size: 23px">Doctor: <b>{{$doctor->persona->nombre}} {{$doctor->persona->apellido}}</b></p>
                <br>
                <p style="font-size: 23px">Especialidad: <b>{{$doctor->especialista->descripcion}}</b></p>
            </div>

        </div>

        <div class="row">
            <div class="col-xl-4 col-lg-4 col-sm-4">
                @include('ui.busqueda')
            </div>
        </div>

        <div class="row layout-top-spacing" id="cancel-row">

            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <div class="table-responsive">
                        <table id="zero-config" class="table dt-table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Documento</th>
                                    <th>Nombre y Apellido</th>
                                    <th>Sexo</th>
                                    <th>Edad</th>
                                    <th>Celular</th>
                                    <th>Orden</th>
                                    <th>Estado</th>
                                    <th class="no-content"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td style="text-align: right">{{number_format($item->paciente->persona->documento, 0, ".", ".")}}</td>
                                        <td>{{$item->paciente->persona->nombre}} {{$item->paciente->persona->apellido}}</td>
                                        <td>
                                            @php
                                                $sexo = '';
                                                if($item->paciente->persona->sexo == 0){
                                                    $sexo = 'SIN ESPECIFICAR';
                                                }
                                                if($item->paciente->persona->sexo == 1){
                                                    $sexo = 'MASCULINO';
                                                }
                                                if($item->paciente->persona->sexo == 2){
                                                    $sexo = 'FEMENINO';
                                                }
                                            @endphp
                                            {{$sexo}}
                                        </td>
                                        <td>
                                            @php
                                                $año = date('Y', strtotime($item->paciente->persona->fecha_nacimiento));
                                                $mes = date('m', strtotime($item->paciente->persona->fecha_nacimiento));
                                                $dia = date('d', strtotime($item->paciente->persona->fecha_nacimiento));

                                                $edad = Carbon\Carbon::createFromDate($año,$mes,$dia)->age;
                                            @endphp
                                           {{($edad)}}
                                        </td>
                                        <td>{{$item->paciente->persona->celular}}</td>
                                        <td style="text-align: right">{{$item->orden}}</td>
                                        <td>{{$item->estado_consulta->descripcion}}</td>
                                        <td>
                                            <a href="{{route('doctor_consulta.atender', $item)}}"
                                            class="bs-popover" data-container="body" data-container="body" data-trigger="hover" data-placement="top" data-content="Atender">
                                                <i class="fas fa-clipboard-user"></i>
                                            </a>
                                        </td>
                                    </tr>

                                @endforeach
                            </tbody>

                        </table>
                    </div>

                </div>
            </div>

        </div>

    </div>

@endsection

@section('js')
    <script src="{{asset('plugins/sweetalerts/sweetalert2.min.js')}}"></script>
    <script src="{{asset('plugins/sweetalerts/custom-sweetalert.js')}}"></script>
    <script src="{{asset('assets/js/elements/popovers.js"')}}"></script>

@endsection
