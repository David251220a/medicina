<div class="form-row">
    <div class="col-md-3 col-sm-6 mb-4">
        <label for="">Documento</label>
        <input type="text" class="form-control" id="documento" name="documento" placeholder="Documento" value="{{old('documento')}}" required>
        <div class="valid-feedback">
            Looks good!
        </div>
    </div>
    <div class="col-md-3 col-sm-6 mb-4">
        <label for="">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="{{old('nombre')}}" required>
        <div class="valid-feedback">
            Looks good!
        </div>
    </div>

    <div class="col-md-3 col-sm-6 mb-4">
        <label for="">Apellido</label>
        <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido" value="{{old('apellido')}}" required>
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
        <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="{{old('fecha_nacimiento')}}" required>
        <div class="valid-feedback">
            Looks good!
        </div>
    </div>
    <div class="col-md-3 col-sm-6 mb-4">
        <label for="">Estado Civil</label>
        <select name="estado_civil_id" id="estado_civil_id" class="form-control">
            @foreach ($estado_civil as $item)
                <option value="{{$item->id}}">{{$item->descripcion}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-3 col-sm-6 mb-4">
        <label for="">Celular</label>
        <input type="text" class="form-control" id="celular" name="celular" value="{{old('celular')}}">
        <div class="valid-feedback">
            Looks good!
        </div>
    </div>
    <div class="col-md-3 col-sm-6 mb-4">
        <label for="">Dirección</label>
        <input type="text" class="form-control" id="direccion" name="direccion" value="{{old('direccion')}}" required>
        <div class="valid-feedback">
            Looks good!
        </div>
    </div>
</div>

@livewire('persona.create-persona')

<div class="form-row">
    <div class="col-md-3 col-sm-6 mb-4">
        <label for="">Dirección Laboral</label>
        <input type="text" class="form-control" id="direccion_laboral" name="direccion_laboral" value="{{old('direccion_laboral')}}">
        <div class="valid-feedback">
            Looks good!
        </div>
    </div>
    <div class="col-md-3 col-sm-6 mb-4">
        <label for="">Telefono Laboral</label>
        <input type="text" class="form-control" id="telefono_laboral" name="telefono_laboral" value="{{old('telefono_laboral')}}">
        <div class="valid-feedback">
            Looks good!
        </div>
    </div>
    <div class="col-md-3 col-sm-6 mb-4">
        <label for="">Fallecido</label>
        <select name="fallecido" id="fallecido" class="form-control">
            <option value="0">NO</option>
            <option value="1">SI</option>
        </select>
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
        <input type="text" class="form-control" id="motivo_inactivo" name="motivo_inactivo" value="{{old('motivo_inactivo')}}">
    </div>
</div>
