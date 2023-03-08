@extends('layouts.admin')

@section('styles')
    <link href="{{asset('plugins/animate/animate.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

    <div class="row layout-top-spacing">
        <div class="col-lg-12 layout-spacing">
            <div class="widget-content widget-content-area">
                <div class="row" style="margin-left: 3px">
                    <h3 class="mb-4">Editar Especialidad: {{$especialidad->descripcion}}</h3>
                </div>
                <form class="needs-validation" novalidate action="{{route('especialidad.update', $especialidad)}}" method="POST" enctype="multipart/form-data"
                onsubmit="return checkSubmit();">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <div class="col-md-3 col-sm-6 mb-4">
                            <label for="">Descripción</label>
                            <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{$especialidad->descripcion}}" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6 mb-4">
                            <label for="">Limite Atención</label>
                            <input type="text" class="form-control" id="limite_atencion" name="limite_atencion"
                            value="{{old('limite_atencion', $especialidad->limite_atencion)}}" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6 mb-4">
                            <label for="">Imagen</label>
                            <input type="file" class="form-control" id="foto" name="foto" placeholder="Foto" accept="image/*">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6 mb-4">
                            <label for="">Estado</label>
                            <select name="estado_id" id="estado_id" class="form-control">
                                <option {{($especialidad->estado_id == 1 ? 'selected' : '')}} value="1">ACTIVO</option>
                                <option {{($especialidad->estado_id == 2 ? 'selected' : '')}} value="2">INACTIVO</option>
                            </select>
                        </div>

                    </div>

                    <button class="btn btn-primary mt-3" type="submit">Grabar</button>
                </form>
            </div>
        </div>

    </div>

@endsection

@section('js')
    <script src="{{asset('assets/js/scrollspyNav.js')}}"></script>
    <script src="{{asset('assets/js/forms/bootstrap_validation/bs_validation_script.js')}}"></script>
@endsection
