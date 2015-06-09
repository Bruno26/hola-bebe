
//URL
var http = location.protocol;
var slashes = http.concat("//");
var baseUrl = slashes.concat(window.location.hostname);
if (baseUrl.indexOf('.protocolizacion.org.ve') == -1) {
    var pathArray = window.location.pathname.split('/');
    var ruta = '/' + pathArray[1]; // 
    //   baseUrl = $(location).attr('href').replace($(location).attr('pathname'), ruta);
    baseUrl = $(location).attr('href').replace($(location).attr('pathname'), ruta) + '/protocolizacion';
}




function conMayusculas(field) {
    field.value = field.value.toUpperCase()
}


function Terreno() {
    if ($('.titularidad').is(":checked")) {
        $('.fecha').show('fade');
    } else {
        $('#Desarrollo_fecha_transferencia').val('');
        $('.fecha').hide('fade');
    }
}


/*
 * FUNCION QUE BUSCA EN SAIME Y EN PERSONA POR NUMERO DE CEDULA Y NACIONALIDAD
 */
function buscarPersonaOficina(nacionalidad, cedula) {

    if (nacionalidad == 'SELECCIONE') {
        bootbox.alert('Verifique que la nacionalidad no esten vacios');
        return false;
    }
    if (cedula == '') {
        bootbox.alert('Verifique que la cédula no esten vacios');
        return false;
    }
    $.ajax({
        url: baseUrl + '/protocolizacion' + "/ValidacionJs/BuscarPersonas",
        async: true,
        type: 'POST',
        data: 'nacionalidad=' + nacionalidad + '&cedula=' + cedula,
        dataType: 'json',
        success: function (datos) {
//            alert(datos);
//            if (datos == 1) {
//                bootbox.alert('Debe Completar el campo Cédula');
//            } else {
//

            $('#Oficina_primer_nombre').val(datos.PRIMERNOMBRE);
            $('#Oficina_persona_id_jefe').val(datos.ID);
            $('#Oficina_segundo_nombre').val(datos.SEGUNDONOMBRE);
            $('#Oficina_primer_apellido').val(datos.PRIMERAPELLIDO);
            $('#Oficina_segundo_apellido').val(datos.SEGUNDOAPELLIDO);
//                
//            }
        },
        error: function (datos) {
            bootbox.alert('Ocurrio un error');
        }
    })
}

/*
 * FUNCION QUE BUSCA EN SAIME POR NUMERO DE CEDULA Y NACIONALIDAD
 * VAR caso= 1 CONSULTA BENEFICIARIO ANTERIO ELSE BENEFICIARIOACUAL
 */
function buscarBenefAnterior(nacionalidad, cedula, caso) {

    if (nacionalidad == '') {
        bootbox.alert('Verifique que la nacionalidad no esté vacio');
        return false;
    }
    if (cedula == '') {
        bootbox.alert('Verifique que la cédula no esté vacio');
        return false;
    }
    $.ajax({
        url: baseUrl + "/ValidacionJs/buscarBeneficiarioAnterior",
        async: true,
        type: 'POST',
        data: 'nacionalidad=' + nacionalidad + '&cedula=' + cedula,
        dataType: 'json',
        success: function (datos) {
            if (caso == 1) {
                if (datos == 1) {
                    $('#ReasignacionVivienda_nombreCompletoAnterior').val('');
                    $('#ReasignacionVivienda_beneficiario_id_anterior').val('');
                    $('#ReasignacionVivienda_cedulaAnterior').val('');
                    $('#ReasignacionVivienda_nacionalidadAnterior').val('');
                    bootbox.alert('Esta persona no se encuentra registrada.');
                } else {
                    $('#ReasignacionVivienda_nombreCompletoAnterior').val(datos.nombre_completo);
                    $('#ReasignacionVivienda_beneficiario_id_anterior').val(datos.persona_id);
                }
            } else {
                if (datos == 1) {
                    $('#ReasignacionVivienda_nombreCompletoActual').val('');
                    $('#ReasignacionVivienda_beneficiario_id_actual').val('');
                    $('#ReasignacionVivienda_cedulaActual').val('');
                    $('#ReasignacionVivienda_nacionalidadActual').val('');
                    bootbox.alert('Esta persona no se encuentra registrada.');
                } else {
                    $('#ReasignacionVivienda_nombreCompletoActual').val(datos.nombre_completo);
                    $('#ReasignacionVivienda_beneficiario_id_actual').val(datos.persona_id);
                }

            }
        },
        error: function (datos) {
            bootbox.alert('Ocurrio un error');
        }

    });
}

function buscarPersonaAbogado(nacionalidad, cedula) {

    if (nacionalidad == 'SELECCIONE') {
        bootbox.alert('Verifique que la nacionalidad no esten vacios');
        return false;
    }
    if (cedula == '') {
        bootbox.alert('Verifique que la cédula no esten vacios');
        return false;
    }
    $.ajax({
        url: baseUrl + '/protocolizacion' + "/ValidacionJs/BuscarPersonas",
        async: true,
        type: 'POST',
        data: 'nacionalidad=' + nacionalidad + '&cedula=' + cedula,
        dataType: 'json',
        success: function (datos) {
//            alert(datos);
//            if (datos == 1) {
//                bootbox.alert('Debe Completar el campo Cédula');
//            } else {
//
            $('#Abogados_primer_nombre').val(datos.PRIMERNOMBRE);
            $('#Abogados_persona_id').val(datos.ID);
            $('#Abogados_primer_apellido').val(datos.PRIMERAPELLIDO);
//                
//            }
        },
        error: function (datos) {
            bootbox.alert('Ocurrio un error');
        }
    })
}

function buscarPersonaCensoA(nacionalidad, cedula) {

    if (nacionalidad == 'SELECCIONE') {
        bootbox.alert('Verifique que la nacionalidad no esten vacios');
        return false;
    }
    if (cedula == '') {
        bootbox.alert('Verifique que la cédula no esten vacios');
        return false;
    }
    $.ajax({
        url: baseUrl + '/protocolizacion' + "/ValidacionJs/BuscarPersonas",
        async: true,
        type: 'POST',
        data: 'nacionalidad=' + nacionalidad + '&cedula=' + cedula,
        dataType: 'json',
        success: function (datos) {
//            alert(datos);
//            if (datos == 1) {
//                bootbox.alert('Debe Completar el campo Cédula');
//            } else {
//
            $('#AsignacionCenso_primer_nombre').val(datos.PRIMERNOMBRE);
            $('#AsignacionCenso_persona_id').val(datos.ID);
            $('#AsignacionCenso_primer_apellido').val(datos.PRIMERAPELLIDO);
//                
//            }
        },
        error: function (datos) {
            bootbox.alert('Ocurrio un error');
        }
    })
}

