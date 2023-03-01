@include('ui.modal_cabecera')

<div class="col-md-12">

    <label for="nombre">Nombre Pais</label>
    <input type="text" wire:model.defer="descripcion" class="form-control" placeholder="Nombre Pais">
    @error('descripcion')
        <span class="mensaje" id="limpiar">
            <div class="alert alert-light-danger border-0 mb-4 mt-2 mensaje" role="alert">
                {{$message}}
            </div>
        </span>
    @enderror
</div>

@include('ui.modal_pie')


