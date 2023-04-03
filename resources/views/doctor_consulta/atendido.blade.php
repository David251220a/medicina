@extends('layouts.admin')

@section('styles')
    <link href="{{asset('assets/css/components/tabs-accordian/custom-tabs.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/select2/select2.min.css')}}">
@endsection

@section('content')

    <div class="layout-px-spacing">

        <div class="widget-content widget-content-area mb-4 mt-2">
            <div class="row">

                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h5>Paciente : <b>{{number_format($consulta->paciente->persona->documento, 0, ".", ".")}} -
                        {{$consulta->paciente->persona->nombre}} {{$consulta->paciente->persona->apellido}}</b>
                    </h5>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-12">
                    <label for="">Peso</label>
                    <label class="form-control">{{$consulta->paciente->peso}}</label>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-12">
                    <label for="">Altura</label>
                    <label class="form-control">{{$consulta->paciente->estatura}}</label>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-12">
                    <label for="">Estado</label>
                    <label for="" class="form-control">ATENDIDO</label>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-12">
                    <label for="">Atendido por Doctor</label>
                    <label for="" class="form-control">{{$consulta->doctor_turno->doctor->persona->nombre}} {{$consulta->doctor_turno->doctor->persona->apellido}}</label>
                </div>
            </div>
        </div>

        <div id="tabsIcons" class="col-lg-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-content widget-content-area icon-tab">

                    <ul class="nav nav-tabs  mb-3 mt-3" id="iconTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="icon-home-tab" data-toggle="tab" href="#icon-home" role="tab" aria-controls="icon-home" aria-selected="true">
                                <i class="fas fa-diagnoses mr-1"></i>
                                Diagnóstico
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="icon-contact-tab" data-toggle="tab" href="#icon-contact" role="tab" aria-controls="icon-contact" aria-selected="false">
                                <i class="fas fa-syringe mr-1"></i>
                                Receta
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="icon-instruciones-tab" data-toggle="tab" href="#icon-instruciones" role="tab" aria-controls="icon-instruciones" aria-selected="false">
                                <i class="fas fa-user-md-chat mr-1"></i>
                                Indicaciones
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="icon-reposo-tab" data-toggle="tab" href="#icon-reposo" role="tab" aria-controls="icon-reposo" aria-selected="false">
                                <i class="fas fa-procedures mr-1"></i>
                                Reposo
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="icon-orden-tab" data-toggle="tab" href="#icon-orden" role="tab" aria-controls="icon-orden" aria-selected="false">
                                <i class="fas fa-notes-medical mr-1"></i>
                                Orden de Estudio
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content" id="iconTabContent-1">
                        <div class="tab-pane fade show active" id="icon-home" role="tabpanel" aria-labelledby="icon-home-tab">
                            <textarea name="diagnostico" class="form-control" cols="30" rows="10" required>{{$consulta->diagnostico}}</textarea>
                            <a href="#" class="btn btn-primary mt-3">Imprimir</a>
                        </div>
                        <div class="tab-pane fade" id="icon-contact" role="tabpanel" aria-labelledby="icon-contact-tab">
                            <textarea name="receta" class="form-control" cols="30" rows="10">{{$consulta->receta}}</textarea>
                            <a href="#" class="btn btn-primary mt-3">Imprimir</a>
                        </div>

                        <div class="tab-pane fade" id="icon-instruciones" role="tabpanel" aria-labelledby="icon-instruciones-tab">
                            <textarea name="instrucciones" class="form-control" cols="30" rows="10">{{$consulta->instrucciones}}</textarea>
                            <a href="#" class="btn btn-primary mt-3">Imprimir</a>
                        </div>

                        <div class="tab-pane fade" id="icon-reposo" role="tabpanel" aria-labelledby="icon-reposo-tab">
                            <textarea name="reposo" class="form-control" cols="30" rows="10">{{$consulta->reposo}}</textarea>
                            <a href="#" class="btn btn-primary mt-3">Imprimir</a>
                        </div>

                        <div class="tab-pane fade" id="icon-orden" role="tabpanel" aria-labelledby="icon-orden-tab">
                            <div class="table-responsive">
                                <table id="zero-config" class="table dt-table-hover" style="width:80%">
                                    <thead>
                                        <tr>
                                            <th>Tipo de Estudio</th>
                                            <th>Observacion</th>
                                            <th class="no-content"></th>
                                        </tr>
                                    </thead>
                                    <tbody id="orden_body">
                                        @if (!(empty($consulta->estudios)))
                                            @foreach ($consulta->estudios as $item)
                                                <tr>
                                                    <td>{{$item->tipo_estudio->descripcion}}</td>
                                                    <td>{{$item->observacion}}</td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <a href="#" class="btn btn-primary mt-3">Imprimir</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <a href="{{route('doctor_consulta.index')}}" class="btn btn-info">Inicio</a>

    </div>


@endsection

@section('js')
    <script src="{{asset('plugins/select2/select2.min.js')}}"></script>
    <script src="{{asset('js/doctor/atender.js')}}"></script>
@endsection
