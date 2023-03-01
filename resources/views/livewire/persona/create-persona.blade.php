<div class="form-row">
    <div class="col-md-3 col-sm-6 mb-4">
        <label for="">Pais</label>
        <select wire:model="pais_id" name="pais_id" class="form-control ">
            @foreach ($pais as $item)
                <option value="{{$item->id}}">{{$item->descripcion}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-3 col-sm-6 mb-4">
        <label for="">Departamento</label>
        <select wire:model="departamento_id" name="departamento_id" class="form-control ">
            @foreach ($departamento as $item)
                <option value="{{$item->id}}">{{$item->descripcion}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-3 col-sm-6 mb-4">
        <label for="">Ciudad</label>
        <select wire:model="ciudad_id" name="ciudad_id" class="form-control ">
            @foreach ($ciudad as $item)
                <option value="{{$item->id}}">{{$item->descripcion}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-3 col-sm-6 mb-4">
        <label for="">Barrio</label>
        <input type="text" class="form-control" id="barrio" name="barrio" placeholder="Barrio" required>
        <div class="valid-feedback">
            Looks good!
        </div>
    </div>
</div>
