@extends('layouts.admin')

@section('styles')

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

        <div class="widget-content widget-content-area">
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

            </div>
        </div>

    </div>




@endsection

@section('js')

@endsection
