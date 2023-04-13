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
                <div class="row" style="margin-left: 3px">
                    <h3 class="mb-4">Editar: {{$persona->nombre}} {{$persona->apellido}}</h3>
                </div>
                <form class="needs-validation" novalidate action="{{route('persona.edit_user_store')}}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-3 col-sm-6 mb-4">
                            <label for="">Documento</label>
                            <label for="" class="form-control">{{old('documento', $persona->documento)}}</label>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 mb-4">
                            <label for="">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="{{old('nombre', $persona->nombre)}}" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6 mb-4">
                            <label for="">Apellido</label>
                            <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido" value="{{old('apellido', $persona->apellido)}}" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6 mb-4">
                            <label for="">Sexo</label>
                            <select name="sexo" id="sexo" class="form-control">
                                <option {{($persona->sexo == 0 ? 'selected' : '')}} value="0">SIN ESPECIFICAR</option>
                                <option {{($persona->sexo == 1 ? 'selected' : '')}} value="1">MASCULINO</option>
                                <option {{($persona->sexo == 2 ? 'selected' : '')}} value="2">FEMENINO</option>
                            </select>
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="col-md-3 col-sm-6 mb-4">
                            <label for="">Fecha de nacimiento</label>
                            <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="{{old('fecha_nacimiento', $persona->fecha_nacimiento)}}" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 mb-4">
                            <label for="">Estado Civil</label>
                            <select name="estado_civil_id" id="estado_civil_id" class="form-control">
                                @foreach ($estado_civil as $item)
                                    <option {{$persona->estado_civil_id == $item->id ? 'selected':''}} value="{{$item->id}}">{{$item->descripcion}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 col-sm-6 mb-4">
                            <label for="">Celular</label>
                            <input type="text" class="form-control" id="celular" name="celular" value="{{old('celular', $persona->celular)}}">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 mb-4">
                            <label for="">Dirección</label>
                            <input type="text" class="form-control" id="direccion" name="direccion" value="{{old('direccion', $persona->direccion)}}" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>

                    @livewire('persona.editar-persona', ['persona' => $persona])

                    <div class="form-row">

                        <div class="col-md-3 col-sm-6 mb-4">
                            <label for="">Barrio</label>
                            <input type="text" class="form-control" id="barrio" name="barrio" placeholder="Barrio" value="{{old('barrio', $persona->barrio)}}" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6 mb-4">
                            <label for="">Dirección Laboral</label>
                            <input type="text" class="form-control" id="direccion_laboral" name="direccion_laboral" value="{{old('direccion_laboral', $persona->direccion_laboral)}}">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 mb-4">
                            <label for="">Telefono Laboral</label>
                            <input type="text" class="form-control" id="telefono_laboral" name="telefono_laboral" value="{{old('telefono_laboral', $persona->telefono_laboral)}}">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-primary mt-3" type="submit">Actualizar</button>
                </form>
            </div>
        </div>

    </div>

@endsection

@section('js')
    <script src="{{asset('plugins/highlight/highlight.pack.js')}}"></script>
    <script src="{{asset('assets/js/custom.js')}}"></script>
    <script src="{{asset('js/pais/index.js')}}"></script>
    <script src="{{asset('plugins/sweetalerts/sweetalert2.min.js')}}"></script>
    <script src="{{asset('plugins/sweetalerts/custom-sweetalert.js')}}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!--  BEGIN CUSTOM SCRIPTS FILE  -->
    <script src="{{asset('assets/js/scrollspyNav.js')}}"></script>
    <script src="{{asset('assets/js/forms/bootstrap_validation/bs_validation_script.js')}}"></script>
    {{-- <script src="{{asset('plugins/select2/select2.min.js')}}"></script>
    <script src="{{asset('plugins/select2/custom-select2.js')}}"></script> --}}
@endsection
