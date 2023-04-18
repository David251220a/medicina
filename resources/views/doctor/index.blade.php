@extends('layouts.admin')

@section('styles')
    <link href="{{asset('plugins/sweetalerts/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/sweetalerts/sweetalert.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/components/custom-sweetalert.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/elements/search.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/datatables.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/dt-global_style.css')}}">
    <link href="{{asset('assets/css/elements/popover.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

    <div class="layout-px-spacing">
        <div class="row" style="margin-top: 15px">
            <div class="col-xl-4 col-lg-4 col-sm-4">
                @include('ui.busqueda')
            </div>

            @can('doctor.create')
                <div class="col-xl-4 col-lg-4 col-sm-4">
                    <a class="btn btn-primary btn-rounded mb-2" href="{{route('doctor.create')}}">Agregar</a>
                </div>
            @endcan

        </div>

        <div class="row layout-top-spacing" id="cancel-row">

            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <table id="zero-config" class="table dt-table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>Documento</th>
                                <th>Nombre y Apellido</th>
                                <th>Sexo</th>
                                <th>Especialidad</th>
                                <th>Celular</th>
                                <th>Estado</th>
                                <th class="no-content"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td style="text-align: right">{{number_format($item->documento, 0, ".", ".")}}</td>
                                    <td>{{$item->nombre}} {{$item->apellido}}</td>
                                    <td>
                                        @php
                                            $sexo='';
                                        @endphp
                                        @if ($item->sexo == 0)
                                            @php $sexo = 'SIN ESPECIFICAR' @endphp
                                        @endif

                                        @if ($item->sexo == 1)
                                            @php $sexo = 'MASCULINO' @endphp
                                        @endif
                                        @if ($item->sexo == 2)
                                            @php $sexo = 'FEMENINO' @endphp
                                        @endif
                                        {{$sexo}}
                                    </td>
                                    <td>{{$item->especialista->descripcion}}</td>
                                    <td>{{$item->celular}}</td>
                                    <td>
                                        @if ($item->estado_id == 1)
                                            <i class="fas fa-circle" style="color:green"></i>
                                        @else
                                            <i class="fas fa-circle" style="color:red"></i>
                                        @endif
                                    </td>
                                    <td>
                                        @can('persona.edit')
                                            <a href="{{route('persona.edit', $item)}}"
                                            class="bs-popover" data-container="body" data-container="body" data-trigger="hover" data-placement="top" data-content="Editar Persona">
                                                <i class="fas fa-user-edit mr-3"></i>
                                            </a>
                                        @endcan

                                        @can('doctor.asignar_especialidad')
                                            <a href="{{route('doctor.asignar_especialidad', $item->doctor_id)}}"
                                            class="bs-popover" data-container="body" data-container="body" data-trigger="hover" data-placement="top" data-content="Asignar Especialidad">
                                                <i class="fas fa-stethoscope"></i>
                                            </a>
                                        @endcan

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>

        </div>

    </div>

@endsection

@section('js')
    <script src="{{asset('plugins/sweetalerts/sweetalert2.min.js')}}"></script>
    <script src="{{asset('plugins/sweetalerts/custom-sweetalert.js')}}"></script>
    <script src="{{asset('assets/js/elements/popovers.js')}}"></script>
    <script src="{{asset('}plugins/table/datatable/datatables.js')}}"></script>
    <script>
        $('#zero-config').DataTable({
            "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
        "<'table-responsive'tr>" +
        "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
               "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [7, 10, 20, 50],
            "pageLength": 7
        });
    </script>
@endsection
