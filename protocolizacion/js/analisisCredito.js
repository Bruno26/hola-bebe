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
 * 
 */
function CalcularAnalisis() {
    var fuenteFinanciamineto = $('#Desarrollo_fuente_financiamiento_id').val();
    var programa = $('#Desarrollo_programa_id').val();
    var montoInical = $('#AnalisisCredito_monto_inicial').val();
    var montoVivienda = $('#AnalisisCredito_costo_vivienda').val();
    var idUnidadFamiliar = $('#AnalisisCredito_unidad_familiar_id').val();
    if ($('#opciones_2').is(':checked')) {
        var valorSalario = $('#opciones_2').val();
    } else {
        var valorSalario = $('#opciones_1').val();

    }
    var tasaInteres = $('#AnalisisCredito_tasa_interes_id').val();
    var plazoCredito = $('#AnalisisCredito_plazo_credito_ano').val();
    var fechaProtocolizacion = $('#AnalisisCredito_fecha_protocolizacion').val();


    if (fuenteFinanciamineto == '') {
        bootbox.alert('Indique la Fuente de Financiamiento.');
        return false;
    }
    if (programa == '') {
        bootbox.alert('Indique el Programa.');
        return false;
    }
    if (programa == '') {
        bootbox.alert('Indique el Programa.');
        return false;
    }


    $.ajax({
        url: baseUrl + "/CalculoAnalisisCredito/Ajax/CalculoTasaAmortizacion",
        async: true,
        type: 'POST',
        data: 'fuenteFinanciamineto=' + fuenteFinanciamineto + '&programa=' + programa + '&montoInical=' + montoInical + '&montoVivienda=' + montoVivienda + '&idUnidadFamiliar=' + idUnidadFamiliar + '&valorSalario=' + valorSalario + '&tasaInteres=' + tasaInteres + '&plazoCredito=' + plazoCredito + '&fechaProtocolizacion=' + fechaProtocolizacion,
        dataType: 'json',
        success: function(datos) {
            $('#sumilador_id').fadeIn("slow");
        },
        error: function(datos) {
            bootbox.alert('Ocurrio un error');
        }
    })

}