@extends('layouts.admin')

@section('styles')

    <link rel="stylesheet" type="text/css" href="{{asset('plugins/select2/select2.min.css')}}">

@endsection

@section('content')

    <div class="row layout-top-spacing">
        <div class="col-lg-12 layout-spacing">
            <div class="widget-content widget-content-area">
                <div class="row" style="margin-left: 3px">
                    <h3 class="mb-4">Agregar Persona</h3>
                </div>
                <form class="needs-validation" novalidate action="{{route('persona.store')}}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-3 col-sm-6 mb-4">
                            <label for="">Documento</label>
                            <input type="text" class="form-control" id="documento" name="documento" placeholder="Documento"required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 mb-4">
                            <label for="">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6 mb-4">
                            <label for="">Apellido</label>
                            <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6 mb-4">
                            <label for="">Sexo</label>
                            <select name="sexo" id="sexo" class="form-control">
                                <option value="0">SIN ESPECIFICAR</option>
                                <option value="1">MASCULINO</option>
                                <option value="2">FEMENINO</option>
                            </select>
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="col-md-3 col-sm-6 mb-4">
                            <label for="">Fecha de nacimiento</label>
                            <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 mb-4">
                            <label for="">Estado_Civil</label>
                            <select name="estado_civil_id" id="estado_civil_id" class="form-control">
                                @foreach ($estado_civil as $item)
                                    <option value="{{$item->id}}">{{$item->descripcion}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 col-sm-6 mb-4">
                            <label for="">Celular</label>
                            <input type="text" class="form-control" id="celular" name="celular">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 mb-4">
                            <label for="">Dirección</label>
                            <input type="text" class="form-control" id="direccion" name="direccion" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>

                    @livewire('persona.create-persona')

                    <div class="form-row">
                        <div class="col-md-3 col-sm-6 mb-4">
                            <label for="">Dirección Laboral</label>
                            <input type="text" class="form-control" id="direccion_laboral" name="direccion_laboral">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 mb-4">
                            <label for="">Telefono Laboral</label>
                            <input type="text" class="form-control" id="telefono_laboral" name="telefono_laboral">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 mb-4">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck1" name="fallecido">
                                <label class="custom-control-label" for="customCheck1">Fallecido?</label>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 mb-4">
                            <label for="">Estado</label>
                            <select name="estado_id" id="estado_id" class="form-control">
                                <option value="1">ACTIVO</option>
                                <option value="2">INACTIVO</option>
                            </select>
                        </div>

                        <div class="col-md-6 col-sm-6 mb-4">
                            <label for="">Motivo Inactivo</label>
                            <input type="text" class="form-control" id="telefono_laboral" name="telefono_laboral">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-primary mt-3" type="submit">Grabar</button>
                </form>
            </div>
        </div>

    </div>

@endsection

@section('js')
    <script src="{{asset('plugins/highlight/highlight.pack.js')}}"></script>
    <script src="{{asset('assets/js/custom.js')}}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!--  BEGIN CUSTOM SCRIPTS FILE  -->
    <script src="{{asset('assets/js/scrollspyNav.js')}}"></script>
    <script src="{{asset('assets/js/forms/bootstrap_validation/bs_validation_script.js')}}"></script>
    {{-- <script src="{{asset('plugins/select2/select2.min.js')}}"></script>
    <script src="{{asset('plugins/select2/custom-select2.js')}}"></script> --}}
@endsection
