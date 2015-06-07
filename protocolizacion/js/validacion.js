
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

if ($('#titularidad').is(':checked')) {
} else {

}

function titularidades() {
    if ($('.titularidad').is(":checked")) {
        $('.fecha_trans').show('fade');

    } else {
        $('.fecha_trans').hide('fade');
    }
}


