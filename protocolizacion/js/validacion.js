
//URL
var http = location.protocol;
var slashes = http.concat("//");
var baseUrl = slashes.concat(window.location.hostname);
if (baseUrl.indexOf('.protocolizacion.org.ve') == -1) {
    var pathArray = window.location.pathname.split('/');
    var ruta = '/' + pathArray[1]; // 
    baseUrl = $(location).attr('href').replace($(location).attr('pathname'), ruta);
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
function buscarPersona(nacionalidad, cedula) {

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
                $('#Oficina_primer_nombre').val(datos.PRIMER_NOMBRE);
//                $('#Oficina_primer_apellido').val(datos.PRIMER_APELLIDO);
//                
//            }
        },
        error: function (datos) {
            bootbox.alert('Ocurrio un error');
        }
    })
}

