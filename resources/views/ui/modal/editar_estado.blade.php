<div id="edit_estado" hidden>
    <div class="Row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <label for="">Estado</label>
            <select name="estado_consulta_id" id="estado_consulta_id" class="form-control">
                @foreach ($estado_consulta as $item)
                    <option value="{{$item->id}}">{{$item->descripcion}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
