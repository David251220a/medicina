            </div>
            <div class="modal-footer">
                <button wire:click="resetUI" class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Cancelar</button>
                @if ($clave == 0)
                    <button wire:click="save" type="button" class="btn btn-primary">Guardar</button>
                @else
                    <button wire:click="update" type="button" class="btn btn-primary">Actualizar</button>
                @endif

            </div>
        </div>
    </div>
</div>


