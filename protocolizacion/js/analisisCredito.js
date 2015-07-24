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
$(document).ready(function() {
    var SalarioGrupoFamiliar = $('#opciones_2').val();
    $.ajax({
        url: baseUrl + "/CalculoAnalisisCredito/Ajax/TipoInterresAplicable",
        async: true,
        type: 'POST',
        data: 'SalarioFamiliar=' + SalarioGrupoFamiliar,
        dataType: 'json',
        success: function(datos) {
            $('#AnalisisCredito_tasa_interes_id').val(datos);
        },
        error: function(datos) {
            bootbox.alert('Ocurrio un error');
        }
    })
});


/*
 * FUNCTION QUE RECALCULA LA TAZA DE INTERE4S APLICABLE SEGUN TABLA DEL SUELDO
 */

function RecalculoDeInteres() {
    if ($('#opciones_2').is(':checked')) {
        var valorSalario = $('#opciones_2').val();
    }
    if ($('#opciones_1').is(':checked')) {
        var valorSalario = $('#opciones_1').val();
    }
    $.ajax({
        url: baseUrl + "/CalculoAnalisisCredito/Ajax/TipoInterresAplicable",
        async: true,
        type: 'POST',
        data: 'SalarioFamiliar=' + valorSalario,
        dataType: 'json',
        success: function(datos) {
            $('#AnalisisCredito_tasa_interes_id').val(datos);
        },
        error: function(datos) {
            bootbox.alert('Ocurrio un error');
        }
    })
}

/*
 * FUNCION QUE BUSCA EN SAIME Y EN PERSONA POR NUMERO DE CEDULA Y NACIONALIDAD
 */
function calcularSueldo(fondo_recuperacion) {
    if (fondo_recuperacion == '') {
        var tableDeclarable = '<table class="table table-bordered"><th>Sueldo Declarado</th><tr><td><i>Sin información</i></td></tr></table>';
        var tableFaov = '<table class="table table-bordered"><th>Sueldo Según Faov</th><tr><td><i>Sin información</i></td></tr></table>';
        $('#ingreso_declarado').html(tableDeclarable);
        $('#ingreso_faov').html(tableFaov);
        bootbox.alert('Verifique que el Fondo de Recuperación no este vacios');
        return false;
    }
//    $.ajax({
//        url: baseUrl + "/ValidacionJs/BuscarEncargadoOficina",
//        async: true,
//        type: 'POST',
//        data: 'nacionalidad=' + nacionalidad + '&cedula=' + cedula,
//        dataType: 'json',
//        success: function (datos) {
//            if (datos == 1 || datos == 2) {
//                $('#iconLoding').hide();
//                $('#Oficina_primer_nombre').val('');
//                $('#Oficina_persona_id_jefe').val('');
//                $('#Oficina_segundo_nombre').val('');
//                $('#Oficina_primer_apellido').val('');
//                $('#Oficina_segundo_apellido').val('');
//                $('#Oficina_fechaNac').val('');
//                if (datos == 1) {
//                    $('#Oficina_cedula').val('');
//                    $('#Oficina_nacionalidad').val('');
//                    bootbox.alert('Esta persona ya se encuentra asignada a una Oficina.');
//                    return false;
//                } else if (datos == 2) {
//                    $('#iconLoding').hide();
//                    $('#Oficina_persona_id_jefe').val('');
//                    $('#Oficina_primer_nombre').attr('readonly', false);
//                    $('#Oficina_segundo_nombre').attr('readonly', false);
//                    $('#Oficina_primer_apellido').attr('readonly', false);
//                    $('#Oficina_segundo_apellido').attr('readonly', false);
//                }
//            } else {
//                $('#Oficina_primer_nombre').val(datos.PRIMERNOMBRE);
//                $('#Oficina_persona_id_jefe').val(datos.ID);
//                $('#Oficina_segundo_nombre').val(datos.SEGUNDONOMBRE);
//                $('#Oficina_primer_apellido').val(datos.PRIMERAPELLIDO);
//                $('#Oficina_segundo_apellido').val(datos.SEGUNDOAPELLIDO);
//                $('#Oficina_fechaNac').val(datos.FECHANACIMIENTO);
//                $('#iconLoding').hide();
//            }
//        },
//        error: function (datos) {
//            bootbox.alert('Ocurrio un error');
//        }
//    })
}