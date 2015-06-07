
//URL
var http = location.protocol;
var slashes = http.concat("//");
var baseUrl = slashes.concat(window.location.hostname);
if (baseUrl.indexOf('.unamujer.org.ve') == -1) {
    var pathArray = window.location.pathname.split('/');
    var ruta = '/' + pathArray[1]; // 
    baseUrl = $(location).attr('href').replace($(location).attr('pathname'), ruta);
}
/*
 * FUNCION PARA LIMPIAR TODOS AQUELLOS CON CLASE limpiar
 */
function Limpiar() {
    $('.limpiar').val('');
    $('#Beneficiario_genero').val('');
    $('#Contacto_telefono').val('');
    $('#Contacto_correo').val('');
}



/*
 * FUNCION QUE BUSCA EN SAIME POR NUMERO DE CEDULA Y NACIONALIDAD
 */
function buscarPersonaSaime(nacionalidad, cedula) {

    if (nacionalidad == 'SELECCIONE') {
        bootbox.alert('Verifique que la nacionalidad no esten vacios');
        return false;
    }
    if (cedula == '') {
        bootbox.alert('Verifique que la cédula no esten vacios');
        return false;
    }
    $.ajax({
        url: baseUrl + "/ValidacionJs/buscarSaime",
        async: true,
        type: 'POST',
        data: 'nacionalidad=' + nacionalidad + '&cedula=' + cedula,
        dataType: 'json',
        success: function(datos) {
            if (!datos) {
                bootbox.alert('Debe Completar el campo Cédula');
                $('.limpiar').val('');
                $('#Persona_sexo').val('');
            } else {
                if (datos != 2) {
                    if (datos['intcedula'] == null) {
                        $('#Persona_nombres').val('').attr("readonly", false);
                        $('#Persona_apellidos').val('').attr("readonly", false);
                        $('#Persona_fecha_nac').val('').attr("readonly", false);
                        $('#Persona_edad').val(datos['edad']);
                    } else {
                        if (datos['edad'] < 15) {
                            bootbox.alert('Debes reunir ciertos requisitos de edad, no puede ser menor de 15 años.');
                            $('.limpiar').val('');
                            $('#Persona_sexo').val('');
                            return false;
                        } else {
                            $('#Persona_nombres').val(datos['strnombre_primer'] + ' ' + datos['strnombre_segundo']).attr("readonly", true);
                            $('#Persona_apellidos').val(datos['strapellido_primer'] + ' ' + datos['strapellido_segundo']).attr("readonly", true);
                            $('#Persona_fecha_nac').val(datos['dtmnacimiento']).attr("readonly", true); //EDAD
                            $('#Persona_edad').val(datos['edad']);
                        }
                    }
                } else {
                    bootbox.alert('Usted ya se encuentra registrada en el sistema de UNAMUJER.');
                    $('.limpiar').val('');
                    $('#Persona_sexo').val('');
                    return false;
                }
            }
        },
        error: function(datos) {
            bootbox.alert('Ocurrio un error');
        }
    });
}



function conMayusculas(field) {
    field.value = field.value.toUpperCase()
}
function calculaEdad(fecha) {
//    field.value = field.value.toUpperCase()
    //alert(fecha);return false;
    if (fecha != '') {
        $.ajax({
            url: baseUrl + "/ValidacionJs/calcularedad",
            async: true,
            type: 'POST',
            data: 'fecha=' + fecha,
            dataType: 'json',
            success: function(datos) {
                if (datos < 15) {
                    bootbox.alert('Debes reunir ciertos requisitos de edad, no puede ser menor de 15 años.');
                    $('.limpiar').val('');
                    $('#Persona_sexo').val('');
                } else {
                    $('#Persona_edad').val(datos);
                }
            },
            error: function(datos) {
                bootbox.alert('Ocurrio un error');
            }
        });
    }
}


function Discapacidad() {
    if ($('.discapacidad').is(":checked")) {
        $('.datoDiscapacidad').show('fade');
    } else {
        $('.datoDiscapacidad').hide('fade');
        $('#Discapacidad_fk_tipo_discapacidad').val('');
    }
}

function Partidos() {
    if ($('.partido').is(":checked") || $('.movimientoSocial').is(":checked")) {
        $('.federado').show('fade');
        $('#msjFederadas').show('fade');
    }

    else {
        $('.federado').hide('fade');
        $('#msjFederadas').hide('fade');
    }
}

function Alertas() {
    if ($('.confederado').is(":checked")) {
        $('#msjFederadas').hide('fade');
        $('#msjconfederadas').show('fade');
    }
    else {
        $('#msjFederadas').show('fade');
        $('#msjconfederadas').hide('fade');
    }
}


function Organizacion() {
    if ($('.organizacion').is(":checked")) {
        $('.contenidoOrganizacionTerritorial').show('fade');
        $('.datoOrganizacion').show('fade');
        $('.esComite').show('fade');
    } else {
        $('#OrganizacionTerritorial_fk_tipo_organizacion').select2('val', '');
        $('.contenidoOrganizacionTerritorial').hide('fade');
        $('.datoOrganizacion').hide('fade');
        $('.esComite').hide('fade');

    }
}


function ComiteTrabajo() {
    if ($('.comiteTrabajo').is(":checked")) {
        $('.datoComiteTrabajo').show('fade');

    } else {
        $('#ComiteTrabajo_fk_comite').select2('val', '');
        $('.datoComiteTrabajo').hide('fade');
        $('.otroComiteTrabajo').hide('fade');

    }
}



function divmovimiento() {

    if ($('.movimientoSocial').is(":checked")) {
        $('.contenidoMovimientoSocial').show('fade');
        $('.datoMovimientoSocial').show('fade');
        $('.ambitoAccion').show('fade');




    } else {

        $('#MovimientoSocial_fk_movimiento_social').select2('val', '');
        $('#MovimientoSocial_fk_ambito_accion').val('');
        $('#MovimientoSocial_otro_movimiento').val('');
        $('.contenidoMovimientoSocial').hide('fade');
        $('.datoMovimientoSocial').hide('fade');
        $('.otroMovimientoSocial').hide('fade');
        $('.ambitoAccion').hide('fade');

    }

}

function MovimientoSocial() {
    if ($('.movimientoSocial').is(":checked") || $('.partido').is(":checked")) {
        $('.federado').show('fade');
        $('#msjFederadas').show('fade');

    } else {
        $('.federado').hide('fade');
        $('#msjFederadas').hide('fade');
    }
}


function Sindicato() {
    if ($('.sindicato').is(":checked")) {
        $('.datoSindicato').show('fade');
        $('.otroSindicato').show('fade');
    } else {
        $('.datoSindicato').hide('fade');
        $('.otroSindicato').hide('fade');
        $('#Sindicato_empresa').val('');
        $('#Sindicato_consejo_trabajo').val('');
    }
}


function MisionSocial() {
    if ($('.misionSocial').is(":checked")) {
        $('.datoMisionSocial').show('fade');

    } else {
        $('#MisionSocial_fk_mision').select2('val', '');
        $('#MisionSocial_otra_mision').val('');
        $('.datoMisionSocial').hide('fade');
        $('.otroMisionSocial').hide('fade');

    }
}

function emailCheck(emailStr, emailid) {
    var checkTLD = 1;
    var knownDomsPat = /^(com|net|org|edu|int|mil|gov|gob|arpa|biz|aero|name|coop|info|pro|museum|COM|NET|ORG|EDU|INT|MIL|GOV|GOB|ARPA|BIZ|AERO|NAME|COOP|INFO|PRO|MUSEUM)$/;
    var emailPat = /^(.+)@(.+)$/;
    var specialChars = "\\(\\)><@,;:\\\\\\\"\\.\\[\\]";
    var validChars = "\[^\\s" + specialChars + "\]";
    var quotedUser = "(\"[^\"]*\")";
    var ipDomainPat = /^\[(\d{1,3})\.(\d{1,3})\.(\d{1,3})\.(\d{1,3})\]$/;
    var atom = validChars + '+';
    var word = "(" + atom + "|" + quotedUser + ")";
    var userPat = new RegExp("^" + word + "(\\." + word + ")*$");
    var domainPat = new RegExp("^" + atom + "(\\." + atom + ")*$");
    var matchArray = emailStr.match(emailPat);
    if (matchArray == null) {

        bootbox.alert("El Formato del Correo Electronico es Incorrecto.\n \n\
                        El formato Correcto es: Usuario@Servidor.Dominio");
        /* -***********    *************- */
        var datos = String($('#' + emailid).select2("val"));
        var arredato = datos.split(',');
        var dato_final = [];
        if (arredato.length - 1) {
            for (var cont = 0; cont < arredato.length - 1; cont++)
                dato_final[cont] = arredato[cont];
        } else
            dato_final = "";
        $('#' + emailid).select2("val", dato_final);
        /* -****************************- */


        return false;
    }
    var user = matchArray[1];
    var domain = matchArray[2];
    for (i = 0; i < user.length; i++) {
        if (user.charCodeAt(i) > 127) {
            bootbox.alert("El nombre de usuario contiene caracteres inv\u00e1lidos.");
            /* -***********    *************- */
            var datos = String($('#' + emailid).select2("val"));
            var arredato = datos.split(',');
            var dato_final = [];
            if (arredato.length - 1) {
                for (var cont = 0; cont < arredato.length - 1; cont++)
                    dato_final[cont] = arredato[cont];
            } else
                dato_final = "";
            $('#' + emailid).select2("val", dato_final);
            /* -****************************- */
            return false;
        }
    }
    for (i = 0; i < domain.length; i++) {
        if (domain.charCodeAt(i) > 127) {
            bootbox.alert("El nombre de dominio contiene caracteres inv\u00e1lidos.");
            /* -***********    *************- */
            var datos = String($('#' + emailid).select2("val"));
            var arredato = datos.split(',');
            var dato_final = [];
            if (arredato.length - 1) {
                for (var cont = 0; cont < arredato.length - 1; cont++)
                    dato_final[cont] = arredato[cont];
            } else
                dato_final = "";
            $('#' + emailid).select2("val", dato_final);
            /* -****************************- */
            return false;
        }
    }
    if (user.match(userPat) == null) {
        bootbox.alert("           El Formato del Correo Electronico es Incorrecto\n \n\
       El formato Correcto es Usuario@Servidor.Dominio");
        /* * -***********    *************- */
        var datos = String($('#' + emailid).select2("val"));
        var arredato = datos.split(',');
        var dato_final = [];
        if (arredato.length - 1) {
            for (var cont = 0; cont < arredato.length - 1; cont++)
                dato_final[cont] = arredato[cont];
        } else
            dato_final = "";
        $('#' + emailid).select2("val", dato_final);
        /* -****************************- */
        return false;
    }
    var IPArray = domain.match(ipDomainPat);
    if (IPArray != null) {
        for (var i = 1; i <= 4; i++) {
            if (IPArray[i] > 255) {
                bootbox.alert("La direcci\u00f3n IP es inv\u00e1lida!");
                /* -***********    *************- */
                var datos = String($('#' + emailid).select2("val"));
                var arredato = datos.split(',');
                var dato_final = [];
                if (arredato.length - 1) {
                    for (var cont = 0; cont < arredato.length - 1; cont++)
                        dato_final[cont] = arredato[cont];
                } else
                    dato_final = "";
                $('#' + emailid).select2("val", dato_final);
                /* -****************************- */
                return false;
            }
        }
        return true;
    }
    var atomPat = new RegExp("^" + atom + "$");
    var domArr = domain.split(".");
    var len = domArr.length;
    for (i = 0; i < len; i++) {
        if (domArr[i].search(atomPat) == -1) {
            alert("El nombre de dominio no parece ser v\u00e1lido.");
            /* -***********    *************- */
            var datos = String($('#' + emailid).select2("val"));
            var arredato = datos.split(',');
            var dato_final = [];
            if (arredato.length - 1) {
                for (var cont = 0; cont < arredato.length - 1; cont++)
                    dato_final[cont] = arredato[cont];
            } else
                dato_final = "";
            $('#' + emailid).select2("val", dato_final);
            /* -****************************- */

            return false;
        }
    }
    if (checkTLD && domArr[domArr.length - 1].length != 2 &&
            domArr[domArr.length - 1].search(knownDomsPat) == -1) {
        alert("La direcci\u00f3n debe terminar en un dominio conocido\no c\u00f3digo de pa\u00eds de dos letras.");
        /* -***********    *************- */
        var datos = String($('#' + emailid).select2("val"));
        var arredato = datos.split(',');
        var dato_final = [];
        if (arredato.length - 1) {
            for (var cont = 0; cont < arredato.length - 1; cont++)
                dato_final[cont] = arredato[cont];
        } else
            dato_final = "";
        $('#' + emailid).select2("val", dato_final);
        /* -****************************- */
        return false;
    }
    if (len < 2) {
        alert("Esta direcci\u00f3n no tiene un nombre de host!");
        /* -***********    *************- */
        var datos = String($('#' + emailid).select2("val"));
        var arredato = datos.split(',');
        var dato_final = [];
        if (arredato.length - 1) {
            for (var cont = 0; cont < arredato.length - 1; cont++)
                dato_final[cont] = arredato[cont];
        } else
            dato_final = "";
        $('#' + emailid).select2("val", dato_final);
        /* -****************************- */
        return false;
    }
    return true;
}



