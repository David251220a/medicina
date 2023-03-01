

window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var ss = $(".basic").select2({
        tags: true,
    });

    window.livewire.on('reloadClassCSs', function() {
        var ss = $(".basic").select2({
            tags: true,
        });
        $('#mensaje').css('display', 'none');
    });

    window.livewire.on('ciudad-add', msj => {
        var ss = $(".basic").select2({
            tags: true,
        });
        $('#exampleModal').modal('hide');
    });

    window.livewire.on('persona-up', msj => {
        $('#referente').css('display', 'block');
    });

}, false);


function ver_referentes(){
    $('#referente').css('display', 'block');
}

function agregar_referente(){
    // document.getElementById("referente_mas").append =
    // '<div class="col-md-4 mb-4">\
    //     <label for="nombre">Cedula</label>\
    //     <input type="text" class="form-control" id="cedula" name="cedula" required>\
    // </div>'

    $('#referente_mas').append(
        '<div class="col-md-4 mb-4">\
        <label for="nombre">Cedula</label>\
        <input type="text" class="form-control" id="cedula" name="cedula" required>\
    </div>');
}
