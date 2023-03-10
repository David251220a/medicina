window.addEventListener('load', function() {

    window.livewire.on('reloadClassCSs', msj => {
        // $(".mensaje").css("display", "none");
        if(document.getElementById("mensaje_1") != null){
            document.getElementById("mensaje_1").style.display = "none";
            document.getElementById("mensaje_2").style.display = "none";
            document.getElementById("mensaje_3").style.display = "none";
            document.getElementById("mensaje_4").style.display = "none";
            document.getElementById("mensaje_5").style.display = "none";
            document.getElementById("mensaje_6").style.display = "none";
        }
        // $('#limpiar').css("display", "none");
    });

    window.livewire.on('persona-add', msj => {
        $('#personamodal').modal('hide');
        swal({
            title: 'Buen Trabajo',
            text: msj,
            type: 'success',
            padding: '2em'
        })
    });

});

function buscar_persona(){
    Livewire.emit('buscar_persona');
}

function doctor_disponible(){
    Livewire.emit('doctor_disponible');
}

function save(){
    Livewire.emit('save');
}
