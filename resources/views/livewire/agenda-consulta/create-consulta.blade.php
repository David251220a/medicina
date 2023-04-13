<div>
    <div class="form-row">
        <div class="col-md-3 col-sm-6 mb-4">
            <label for="">Documento Paciente</label>
            <input wire:model.defer="documento_paciente" type="text" class="form-control" placeholder="Documento"
            onkeyup="punto_decimal(this)" onchange="punto_decimal(this)" required>
            @if ($error_persona)
                <span class="red">
                    {{$error_persona}}
                </span>
            @endif
            <input type="text" class="form-control" name="paciente_id" value="{{$paciente_id}}" hidden>
        </div>

        <div class="col-md-3 col-sm-6 mb-2">
            <label for="">Nombre Paciente</label>
            <input type="text" class="form-control" value="{{$paciente_nombre}}" readonly required>
        </div>

        <div class="col-md-3 col-sm-6 mb-2">
            <button type="button" class="btn btn-info" onclick="buscar_persona()">Buscar</button>
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#personamodal" style="border-radius: 15px">Crear Paciente</button>
        </div>

    </div>

    <div class="form-row">
        <div class="col-md-3 col-sm-6 mb-2">
            <label for="">Fecha Agenda</label>
            <input wire:model.defer="fecha" type="date" class="form-control" value="{{$fecha}}" name="fecha_consulta">
            @if ($error_fecha)
                <span class="red">
                    {{$error_fecha}}
                </span>
            @endif
        </div>

        <div class="col-md-4 col-sm-6 mb-2">
            <label for="">Doctor</label>
            <select wire:model="turno_id" class="form-control" name="doctor_turno_id" required>
                @php
                    $hay_doctores = 0;
                @endphp
                @if (count($doctor) > 0)
                    @foreach ($doctor as $item)
                        @if ($item->cont < $limite_atencion)
                            <option value="{{$item->id}}">{{$item->cont}} - {{$item->doctor->persona->nombre}} {{$item->doctor->persona->apellido}}</option>
                            @php
                                $hay_doctores = 1;
                            @endphp
                        @endif
                    @endforeach
                    @if ($hay_doctores == 0)
                        <option value="" selected>No hay doctores disponible en esta fecha!</option>
                    @endif
                @else
                    <option value="" selected>No hay doctores disponible en esta fecha!</option>
                @endif

            </select>
        </div>
        <div class="col-md-4 col-sm-6 mb-2">
            <label for="">Detalles Doctor</label>
            <p>{{$detalles_doctor}}</p>
        </div>
        <div class="col-md-4 col-sm-6 mb-2">
            <button type="button" class="btn btn-info" onclick="doctor_disponible()">Doctor Disponible</button>
        </div>
    </div>

    @include('ui.modal.agregar_persona')
</div>
