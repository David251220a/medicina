@extends('layouts.admin')

@section('styles')
    <link href="{{asset('assets/css/users/user-profile.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/datatables.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/dt-global_style.css')}}">
@endsection

@section('content')

<div class="layout-px-spacing">

    <div class="row layout-spacing">

        <!-- Content -->
        <div class="col-xl-4 col-lg-6 col-md-5 col-sm-12 layout-top-spacing">

            <div class="user-profile layout-spacing">
                <div class="widget-content widget-content-area">
                    <div class="d-flex justify-content-between">
                        <h3 class="ml-3 mt-2">Perfil</h3>
                        <a href="{{ route('persona.edit_user')}}" class="mt-2 mr-2 edit-profile">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3">
                            <path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
                        </a>
                    </div>
                    <div class="text-center user-info">
                        <img src="{{Storage::url('public/icono/user.png')}}" alt="avatar" width="15%">
                        <p class="">{{Auth::user()->name}}</p>
                    </div>
                    <div class="user-info-list">

                        <div class="">
                            <ul class="contacts-block list-unstyled">

                                <li class="contacts-block__item">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2">
                                        </rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                        {{date('d/m/Y', strtotime(Auth::user()->persona->fecha_nacimiento))}}
                                </li>
                                <li class="contacts-block__item">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin">
                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                                    {{Auth::user()->persona->direccion}}
                                </li>
                                <li class="contacts-block__item">
                                    <i class="fas fa-street-view mr-3" style="font-size: 20px"></i> {{Auth::user()->persona->ciudad->descripcion}} - {{Auth::user()->persona->barrio}}
                                </li>
                                <li class="contacts-block__item">
                                    <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail">
                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                    {{Auth::user()->email}}
                                </a>
                                </li>
                                <li class="contacts-block__item">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-phone">
                                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84
                                    12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                                    {{Auth::user()->persona->celular}}
                                </li>

                                <li class="contacts-block__item">
                                    <a href="{{route('home.agendar')}}" class="btn btn-primary">Agendar Consulta</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="education layout-spacing ">
                <div class="widget-content widget-content-area">
                    <h3 class="ml-3 mt-2">Ultimas Consultas</h3>
                    <div class="">
                        <table class="table table-hover table-dark">
                            <thead>
                                <tr>
                                    <th>Fecha Consulta</th>
                                    <th>Doctor</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($consultas)
                                    @foreach ($consultas as $item)
                                        <tr>
                                            <td>{{$item->fecha_consulta}}</td>
                                            <td>{{$item->doctor_turno->doctor->persona->nombre}} {{$item->doctor_turno->doctor->persona->apellido}}</td>
                                            <td>
                                                <a href="#" class="btn btn-info">Ver</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="3"><p>No ha realizado ninguna consulta!</p></td>
                                    </tr>
                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-xl-8 col-lg-6 col-md-7 col-sm-12 layout-top-spacing">
            <div class="bio layout-spacing ">
                <div class="widget-content widget-content-area">
                    <h3 class="ml-3 mt-2">Consultas Agendados</h3>
                    <table id="zero-config" class="table dt-table-hover">
                        <thead>
                            <tr>
                                <th>Fecha Agenda</th>
                                <th>Doctor</th>
                                <th>Especialidad</th>
                                <th>Orden</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($agenda)
                                @foreach ($agenda as $item)
                                    <tr>
                                        <td>{{date('d/m/Y', strtotime($item->fecha_consulta))}}</td>
                                        <td>{{$item->doctor_turno->doctor->persona->nombre}} {{$item->doctor_turno->doctor->persona->apellido}}</td>
                                        <td>{{$item->doctor_turno->especialidad->descripcion}}</td>
                                        <td>{{$item->orden}}</td>
                                    </tr>
                                @endforeach
                            @else

                            @endif
                        </tbody>

                    </table>

                </div>
            </div>
        </div>

    </div>
</div>


@endsection

@section('js')
    <script src="{{asset('plugins/table/datatable/datatables.js')}}"></script>
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
