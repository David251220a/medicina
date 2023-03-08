let cont = 0;

function agregar_fila(){
    let dia = document.getElementById('dias').value;
    let hora_desde = document.getElementById('hora_desde').value;
    let hora_hasta = document.getElementById('hora_hasta').value;
    let nombre_dia = saber_dia(dia);

    if((hora_desde == '') || (hora_hasta == '')){
        if(hora_hasta == ''){
            document.getElementById('mensaje_hasta').style.display = "block";
        }
        if(hora_desde == ''){
            document.getElementById('mensaje_desde').style.display = "block";
        }
        return false;
    }else{
        document.getElementById('mensaje_hasta').style.display = "none";
        document.getElementById('mensaje_desde').style.display = "none";
    }

    document.getElementById("body_horario").insertRow(-1).innerHTML = '<tr id="fila['+cont+']">\
                                                                            <td class"text-center"> \
                                                                                <input type="hidden" class="" name="dias[]" value="'+dia+'"> \
                                                                                <input type="text" class="form-control" value="'+nombre_dia+'" readonly> \
                                                                            </td>\
                                                                            <td class"text-center"> \
                                                                                <input type="time" class="form-control" name="hora_desde[]" value="'+hora_desde+'" readonly> \
                                                                            </td>\
                                                                            <td class"text-center"> \
                                                                                <input type="time" class="form-control" name="hora_hasta[]" value="'+hora_hasta+'" readonly> \
                                                                            </td>\
                                                                            <td class"text-center"> \
                                                                                <button id="'+cont+'" type="button" onclick="eliminar_fila(this)"><i class="fas fa-backspace"></i></button> \
                                                                            </td>\
                                                                        </tr>';
}


function saber_dia(dia){
    let nombre_dia = '';
    if(dia == 1){
        nombre_dia = 'DOMINGO';
    }

    if(dia == 2){
        nombre_dia = 'LUNES';
    }

    if(dia == 3){
        nombre_dia = 'MARTES';
    }

    if(dia == 4){
        nombre_dia = 'MIERCOLES';
    }

    if(dia == 5){
        nombre_dia = 'JUEVES';
    }

    if(dia == 6){
        nombre_dia = 'VIERNES';
    }

    if(dia == 7){
        nombre_dia = 'SABADO';
    }

    return nombre_dia;
}

function eliminar_fila(input)
{
    console.log(input.id);
}
