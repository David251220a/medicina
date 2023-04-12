@extends('layouts.admin')

@section('styles')
    <link href="{{asset('assets/css/elements/search.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/datatables.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/dt-global_style.css')}}">
    <link href="assets/css/elements/popover.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')

    <div class="layout-px-spacing">
        <h3 class="mt-3">Consulta General</h3>
        <div class="widget-content widget-content-area br-6">
            <form action="" method="get">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-sm-4 ml-3 mt-2">

                        <div class="search-input-group-style input-group mb-3">
                            <div class="input-group-prepend">
                                <button type="button" style="padding: 0px; margin: 0px;" class="btn btn-primary">
                                    <span class="input-group-text" id="basic-addon1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                        </svg>
                                    </span>
                                </button>
                            </div>
                            @php
                                $search_formateado='';
                                if(!(empty($search) )){
                                    $search_formateado = number_format($search, 0, ".", ".");
                                }
                            @endphp
                            <input type="text" name="search" id="search" class="form-control" placeholder="Search..."
                            aria-label="Username" aria-describedby="basic-addon1" value="{{$search_formateado}}"
                            onkeyup="punto_decimal(this)" onchange="punto_decimal(this)">
                        </div>

                    </div>

                </div>

                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-sm-4 ml-3 mt-2 mb-2">
                        <label for="">Doctor</label>
                        <select name="doctor" id="doctor" class="form-control">
                            <option>-- TODOS --</option>
                            @foreach ($doctores as $item)
                                <option value="{{$item->id}}">{{$item->persona->nombre}} {{$item->persona->apellido}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-sm-4 ml-3 mt-2 mb-2">
                        <label for="">Fecha</label>
                        <input type="date" class="form-control" name="fecha">
                    </div>

                    <div class="col-xl-3 col-lg-3 col-sm-4 ml-3 mt-2 mb-2">
                        <button type="submit" class="btn btn-info">Buscar</button>
                    </div>

                </div>
            </form>
        </div>

        <div class="row layout-top-spacing" id="cancel-row">

            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <table id="zero-config" class="table dt-table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>Documento</th>
                                <th>Paciente</th>
                                <th>Orden</th>
                                <th>Doctor</th>
                                <th>Especialidad</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{$item->paciente->documento}}</td>
                                    <td>{{$item->paciente->nombre}} {{$item->paciente->apellido}}</td>
                                    <td>{{$item->orden}}</td>
                                    <td>{{$item->doctor_turno->doctor->nombre}}</td>
                                    <td>{{$item->doctor_turno->especialidad->descripcion}}</td>
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
