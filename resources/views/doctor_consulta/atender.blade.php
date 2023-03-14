@extends('layouts.admin')

@section('styles')
    <link href="{{asset('assets/css/components/tabs-accordian/custom-tabs.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/editors/quill/quill.snow.css')}}">
@endsection

@section('content')

    <div class="layout-px-spacing">

        <div class="row" style="margin-top: 15px">
            <div class="col-lg-12 col-md-12 col-sm-12 mb-2" style="line-height: 12px">
                <p style="font-size: 23px">Doctor: <b>{{$doctor->persona->nombre}} {{$doctor->persona->apellido}}</b></p>
                <br>
                <p style="font-size: 23px">Especialidad: <b>{{$doctor->especialista->descripcion}}</b></p>
            </div>
        </div>

        <div class="widget-content widget-content-area mb-4">
            <div class="row">

                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h5>Paciente : <b>{{number_format($agendaConsulta->paciente->persona->documento, 0, ".", ".")}} -
                        {{$agendaConsulta->paciente->persona->nombre}} {{$agendaConsulta->paciente->persona->apellido}}</b>
                    </h5>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-12">
                    <label for="">Peso</label>
                    <input type="number" class="form-control" value="">
                </div>

                <div class="col-lg-3 col-md-3 col-sm-12">
                    <label for="">Altura</label>
                    <input type="number" class="form-control">
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

                            <div id="editor-1">
                            </div>

                        </div>
                        <div class="tab-pane fade" id="icon-contact" role="tabpanel" aria-labelledby="icon-contact-tab">

                            <div id="editor-2">
                            </div>

                        </div>

                        <div class="tab-pane fade" id="icon-instruciones" role="tabpanel" aria-labelledby="icon-instruciones-tab">

                            <div id="editor-3">
                            </div>

                        </div>

                        <div class="tab-pane fade" id="icon-instruciones" role="tabpanel" aria-labelledby="icon-instruciones-tab">

                            <div id="editor-4">
                            </div>

                        </div>

                        <div class="tab-pane fade" id="icon-orden" role="tabpanel" aria-labelledby="icon-orden-tab">

                            lol

                        </div>

                    </div>


                </div>
            </div>
        </div>


    </div>




@endsection

@section('js')
    <script src="{{asset('plugins/editors/quill/quill.js')}}"></script>
    <script src="{{asset('plugins/editors/quill/custom-quill.js')}}"></script>
    <script>
        var quill = new Quill('#editor-1', {
        modules: {
            toolbar: [
            [{ header: [1, 2, false] }],
            ['bold', 'italic', 'underline'],
            ['image']
            ]
        },
        placeholder: 'Diagnóstico del paciente...',
        theme: 'snow'
        });

        var quill = new Quill('#editor-2', {
        modules: {
            toolbar: [
            [{ header: [1, 2, false] }],
            ['bold', 'italic', 'underline'],
            ['image']
            ]
        },
        placeholder: 'Receta medica...',
        theme: 'snow'  // or 'bubble'
        });

        var quill = new Quill('#editor-3', {
        modules: {
            toolbar: [
            [{ header: [1, 2, false] }],
            ['bold', 'italic', 'underline'],
            ['image']
            ]
        },
        placeholder: 'Indicaciones medica...',
        theme: 'snow'  // or 'bubble'
        });

        var quill = new Quill('#editor-4', {
        modules: {
            toolbar: [
            [{ header: [1, 2, false] }],
            ['bold', 'italic', 'underline'],
            ['image']
            ]
        },
        placeholder: 'Reposo medico...',
        theme: 'snow'  // or 'bubble'
        });
    </script>
@endsection
