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