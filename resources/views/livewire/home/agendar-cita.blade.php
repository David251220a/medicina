<div>
    <div class="form-row">
        <div class="col-md-3 col-sm-6 mb-4">
            <label for="">Documento Paciente</label>
            <label for="" class="form-control"> {{number_format(Auth::user()->persona->documento, 0, ".", ".")}}</label>
        </div>

        <div class="col-md-3 col-sm-6 mb-2">
            <label for="">Nombre Paciente</label>
            <label for="" class="form-control"> {{Auth::user()->persona->nombre}} {{Auth::user()->persona->apellido}}</label>
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
</div>
