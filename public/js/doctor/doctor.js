let cont = 0;
let lunes = 0 ;
let martes = 0;
let miercoles = 0;
let jueves = 0;
let viernes = 0;
let sabado = 0;
let domingo = 0;

document.addEventListener("DOMContentLoaded", function() {
    recorrer_fila();
});

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

    let valido = verificar_cargados_dias(dia);
    if(valido == true){
        return false;
    }

    aux_dias(1, dia);

    document.getElementById("body_horario").insertRow(-1).innerHTML = '<tr>\
                                                                            <td class"text-center"> \
                                                                                <input type="hidden" class="" name="dias[]" value="'+dia+'"> \
                                                                                '+nombre_dia+' \
                                                                            </td>\
                                                                            <td class"text-center"> \
                                                                                <input type="time" class="form-control" name="hora_desde[]" value="'+hora_desde+'" style="display: none" readonly> \
                                                                                '+hora_desde+' \
                                                                            </td>\
                                                                            <td class"text-center"> \
                                                                                <input type="time" class="form-control" name="hora_hasta[]" value="'+hora_hasta+'" style="display: none" readonly> \
                                                                                '+hora_hasta+' \
                                                                            </td>\
                                                                            <td class"text-center"> \
                                                                                <button id="'+dia+'" type="button" onclick="eliminar_fila(this)"><i class="fas fa-backspace"></i></button> \
                                                                            </td>\
                                                                        </tr>';
    cont ++;

}

function agregar_semana(){
    let dia = document.getElementById('dias').value;
    let hora_desde = document.getElementById('hora_desde').value;
    let hora_hasta = document.getElementById('hora_hasta').value;
    let nombre_dia = '';

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

    let valido = verificar_cargados_dias(dia);
    if(valido == true){
        return false;
    }

    aux_dias(3, dia);

    for (let index = 1; index <= 7; index++) {
        nombre_dia = saber_dia(index);
        document.getElementById("body_horario").insertRow(-1).innerHTML = '<tr>\
                                                                                <td class"text-center"> \
                                                                                    <input type="hidden" class="" name="dias[]" value="'+index+'"> \
                                                                                   '+nombre_dia+' \
                                                                                </td>\
                                                                                <td class"text-center"> \
                                                                                    <input type="time" class="form-control" name="hora_desde[]" value="'+hora_desde+'" style="display: none" readonly> \
                                                                                    '+hora_desde+' \
                                                                                </td>\
                                                                                <td class"text-center"> \
                                                                                    <input type="time" class="form-control" name="hora_hasta[]" value="'+hora_hasta+'" style="display: none" readonly> \
                                                                                    '+hora_hasta+' \
                                                                                </td>\
                                                                                <td class"text-center"> \
                                                                                    <button id="'+dia+'" type="button" onclick="eliminar_fila(this)"><i class="fas fa-backspace"></i></button> \
                                                                                </td>\
                                                                            </tr>';
    }
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
    dia = input.id;
    aux_dias(2, dia);
    $(input).closest('tr').remove();
}

function aux_dias(modo, dia){
    // Para agregar
    dia = parseInt(dia);
    if (modo == 1){

        if(dia == 1){
            domingo = 1;
        }

        if(dia == 2){
            lunes = 1;
        }

        if(dia == 3){
            martes = 1;
        }

        if(dia == 4){
            miercoles = 1;
        }

        if(dia == 5){
            jueves = 1;
        }

        if(dia == 6){
            viernes = 1;
        }

        if(dia == 7){
            sabado = 1;
        }
    }
    // Para eliminar
    if (modo == 2){

        if(dia == 1){
            domingo = 0;
        }

        if(dia == 2){
            lunes = 0;
        }

        if(dia == 3){
            martes = 0;
        }

        if(dia == 4){
            miercoles = 0;
        }

        if(dia == 5){
            jueves = 0;
        }

        if(dia == 6){
            viernes = 0;
        }

        if(dia == 7){
            sabado = 0;
        }
    }
    // Marcar todos
    if(modo == 3){
        lunes = 1 ;
        martes = 1;
        miercoles = 1;
        jueves = 1;
        viernes = 1;
        sabado = 1;
        domingo = 1;
    }

}


function verificar_cargados_dias(dia){
    dia = parseInt(dia);
    if (dia == 1){
        if(domingo == 1){
            document.getElementById('mensaje_dia').style.display = "block";
            return true
        }
    }

    if(dia == 2){
        if(lunes == 1){
            document.getElementById('mensaje_dia').style.display = "block";
            return true
        }
    }

    if (dia == 3){
        if(martes == 1){
            document.getElementById('mensaje_dia').style.display = "block";
            return true;
        }
    }

    if (dia == 4){
        if(miercoles == 1){
            document.getElementById('mensaje_dia').style.display = "block";
            return true;
        }
    }

    if (dia == 5){
        if(jueves == 1){
            document.getElementById('mensaje_dia').style.display = "block";
            return true;
        }
    }

    if (dia == 6){
        if(viernes == 1){
            document.getElementById('mensaje_dia').style.display = "block";
            return true;
        }
    }

    if (dia == 7){
        if(sabado == 1){
            document.getElementById('mensaje_dia').style.display = "block";
            return true;
        }
    }

    document.getElementById('mensaje_dia').style.display = "none";
    return false
}


function recorrer_fila(){

    var resume_table = document.getElementById("body_horario");

    for (var i = 0, row; row = resume_table.rows[i]; i++) {

        for (var j = 0, col; col = row.cells[j]; j++) {
            if(j == 0){
                // console.log(col.innerText);
                verificar(col.innerText);
            }
        }
    }
}

function verificar(dia){
    if(dia == 'DOMINGO'){
        domingo = 1;
    }

    if(dia == 'LUNES'){
        lunes = 1;
    }
    if(dia == 'MARTES'){
        martes = 1;
    }
    if(dia == 'MIERCOLES'){
        miercoles = 1;
    }
    if(dia == 'JUEVES'){
        jueves = 1;
    }
    if(dia == 'VIERNES'){
        viernes = 1;
    }
    if(dia == 'SABADO'){
        sabado = 1;
    }
}
