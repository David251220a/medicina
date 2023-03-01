<div>

    <button class="btn btn-primary btn-rounded mb-4" data-toggle="modal" data-target="#paismodal">Agregar</button>

    <div wire:ignore.self class="modal fade" id="paismodal" tabindex="-1" role="dialog" aria-labelledby="paismodal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="paismodal">Crear Pais</h5>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <label for="celular">Nombre Pais</label>
                        <input type="text" wire:model.defer="nombre" class="form-control" placeholder="Nombre Pais">
                        @error('nombre')
                            <span id="mensaje">
                                <div class="alert alert-light-danger border-0 mb-4 mt-2" role="alert">
                                    Por favor complete este campo
                                </div>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button wire:click="resetUI" class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Cancelar</button>
                    <button wire:click="save" type="button" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>
    </div>

</div>
