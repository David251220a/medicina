window.addEventListener('load', function() {

    window.livewire.on('reloadClassCSs', msj => {
        $(".mensaje").css("display", "none");
        // $('#limpiar').css("display", "none");
    });

    window.livewire.on('pais-add', msj => {
        $('#modal').modal('hide');
        swal({
            title: 'Buen Trabajo',
            text: msj,
            type: 'success',
            padding: '2em'
        })
    });

    window.livewire.on('pais-upd', msj => {
        $('#modal').modal('hide');
        swal({
            title: 'Buen Trabajo',
            text: msj,
            type: 'success',
            padding: '2em'
        })
    });

    window.livewire.on('editar', function() {
        var intro = document.getElementById('limpiar');
        $(".mensaje").css("display", "none");
        // $('#limpiar').css("display", "none");
        $('#modal').modal('show');
    });

    Livewire.on('eliminar', identificador => {

        Swal.fire({
            title: 'Eliminar Pais',
            text: 'Desea eliminar el Pais?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si'
        }).then(function(result) {
            if (result.value) {
                Livewire.emit('destroy', identificador);
            }
        })
    });

    window.livewire.on('pais-del', msj => {
        swal({
            title: 'Buen Trabajo',
            text: msj,
            type: 'success',
            padding: '2em'
        })
    });

});



