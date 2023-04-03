@extends('layouts.admin')

@section('styles')
    <link href="{{asset('assets/css/components/tabs-accordian/custom-tabs.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/select2/select2.min.css')}}">
@endsection

@section('content')

    <div class="layout-px-spacing">

        <div class="widget-content widget-content-area mb-4 mt-2">
            <div class="row" style="margin-top: 15px">
                <div class="col-lg-6 col-md-6 col-sm-12 mb-2" style="line-height: 12px">
                    <p style="font-size: 23px">Doctor: <b>{{$doctor->persona->nombre}} {{$doctor->persona->apellido}}</b></p>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 mb-2" style="line-height: 12px">
                    <p style="font-size: 23px">Especialidad: <b>{{$doctor->especialista->descripcion}}</b></p>
                </div>
            </div>
        </div>

        <form action="{{route('doctor_consulta.store')}}" method="POST">
            @csrf

            <div class="widget-content widget-content-area mb-4">
                <div class="row">

                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <h5>Paciente : <b>{{number_format($agendaConsulta->paciente->persona->documento, 0, ".", ".")}} -
                            {{$agendaConsulta->paciente->persona->nombre}} {{$agendaConsulta->paciente->persona->apellido}}</b>
                        </h5>
                        <input type="hidden" name="paciente_id" value="{{$agendaConsulta->paciente_id}}">
                        <input type="hidden" name="doctor_turno_id" value="{{$agendaConsulta->doctor_turno_id}}">
                        <input type="hidden" name="agenda_id" value="{{$agendaConsulta->id}}">
                        <input type="hidden" name="doctor_id" value="{{$doctor->id}}">
                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-12">
                        <label for="">Peso</label>
                        <input type="number" name="peso" class="form-control" value="{{ (empty($agendaConsulta->paciente) ? '' : $agendaConsulta->paciente->peso) }}" required>
                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-12">
                        <label for="">Altura</label>
                        <input type="number" name="altura" class="form-control" value="{{ (empty($agendaConsulta->paciente) ? '' : $agendaConsulta->paciente->estatura) }}" required>
                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-12">
                        <label for="">Estado</label>
                        <select name="estado_consulta_id" id="" class="form-control">
                            @foreach ($estado_consulta as $item)
                                <option {{($item->id == $agendaConsulta->estado_consulta_id ? 'selected':  '')}} value="{{$item->id}}">{{$item->descripcion}}</option>
                            @endforeach
                        </select>
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
                                <textarea name="diagnostico" class="form-control" cols="30" rows="10" required></textarea>
                            </div>
                            <div class="tab-pane fade" id="icon-contact" role="tabpanel" aria-labelledby="icon-contact-tab">
                                <textarea name="receta" class="form-control" cols="30" rows="10"></textarea>
                            </div>

                            <div class="tab-pane fade" id="icon-instruciones" role="tabpanel" aria-labelledby="icon-instruciones-tab">
                                <textarea name="instrucciones" class="form-control" cols="30" rows="10"></textarea>
                            </div>

                            <div class="tab-pane fade" id="icon-reposo" role="tabpanel" aria-labelledby="icon-reposo-tab">
                                <textarea name="reposo" class="form-control" cols="30" rows="10"></textarea>
                            </div>

                            <div class="tab-pane fade" id="icon-orden" role="tabpanel" aria-labelledby="icon-orden-tab">
                                <div class="form-row">
                                    <div class="col-lg-3 col-md-3 col-sm-12">
                                        <label for="">Tipo de Estudio</label>
                                        <select id="tipo_estudio_id" class="form-control basic">
                                            @foreach ($tipo_estudio as $item)
                                                <option value="{{$item->id}}">{{$item->descripcion}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-lg-5 col-md-5 col-sm-12">
                                        <label for="">Descripción</label>
                                        <input type="text" class="form-control" id="descripcion_estudio">
                                    </div>

                                    <div class="col-lg-3 col-md-3 col-sm-12">
                                        <button type="button" class="btn btn-info" onclick="agregar_orden()">Agregar</button>
                                    </div>
                                </div>

                                <div class="table-responsive mt-5">
                                    <table id="zero-config" class="table dt-table-hover" style="width:80%">
                                        <thead>
                                            <tr>
                                                <th>Tipo de Estudio</th>
                                                <th>Descripción</th>
                                                <th class="no-content"></th>
                                            </tr>
                                        </thead>
                                        <tbody id="orden_body">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>

        </form>
    </div>




@endsection

@section('js')
    <script src="{{asset('plugins/select2/select2.min.js')}}"></script>
    <script src="{{asset('js/doctor/atender.js')}}"></script>
@endsection
