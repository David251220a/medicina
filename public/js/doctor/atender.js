var ss = $(".basic").select2({
    tags: true,
});

function agregar_orden(){

    let tipo_estudio = document.getElementById('tipo_estudio_id');
    let descripcion_estudio = document.getElementById('descripcion_estudio').value;
    let id = tipo_estudio.options[tipo_estudio.selectedIndex].value;
    let descripcion = tipo_estudio.options[tipo_estudio.selectedIndex].text;
    if(descripcion == ''){
        descripcion = ' ';
    }

    document.getElementById("orden_body").insertRow(-1).innerHTML = '<tr>\
                                                                            <td class"text-center"> \
                                                                                <input type="hidden" class="" name="tipo_estudio_orden[]" value="'+id+'"> \
                                                                                '+descripcion+' \
                                                                            </td>\
                                                                            <td class"text-center"> \
                                                                                <input type="hidden" class="form-control" name="descripcion_orden[]" value="'+descripcion_estudio+'"> \
                                                                                '+descripcion_estudio+' \
                                                                            </td>\
                                                                            <td class"text-center"> \
                                                                                <button type="button" onclick="eliminar_fila(this)"><i class="fas fa-backspace"></i></button> \
                                                                            </td>\
                                                                        </tr>';
}

function eliminar_fila(input)
{
    dia = input.id;
    $(input).closest('tr').remove();
}
