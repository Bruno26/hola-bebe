
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
    $('#iconLoding').show();
    $('#Oficina_primer_nombre').val('');
    $('#Oficina_persona_id_jefe').val('');
    $('#Oficina_segundo_nombre').val('');
    $('#Oficina_primer_apellido').val('');
    $('#Oficina_segundo_apellido').val('');
    $('#Oficina_fechaNac').val('');
    $('#Oficina_primer_nombre').attr('readonly', true);
    $('#Oficina_segundo_nombre').attr('readonly', true);
    $('#Oficina_primer_apellido').attr('readonly', true);
    $('#Oficina_segundo_apellido').attr('readonly', true);
    if (nacionalidad == '') {
        bootbox.alert('Verifique que la nacionalidad no esten vacios');
        return false;
    }
    if (cedula == '') {
        bootbox.alert('Verifique que la cédula no esten vacios');
        return false;
    }
    $.ajax({
        url: baseUrl + "/ValidacionJs/BuscarEncargadoOficina",
        async: true,
        type: 'POST',
        data: 'nacionalidad=' + nacionalidad + '&cedula=' + cedula,
        dataType: 'json',
        success: function(datos) {
            if (datos == 1 || datos == 2) {
                $('#Oficina_primer_nombre').val('');
                $('#Oficina_persona_id_jefe').val('');
                $('#Oficina_segundo_nombre').val('');
                $('#Oficina_primer_apellido').val('');
                $('#Oficina_segundo_apellido').val('');
                $('#Oficina_fechaNac').val('');
                $('#iconLoding').hide();
                if (datos == 1) {
                    $('#Oficina_cedula').val('');
                    $('#Oficina_nacionalidad').val('');
                    bootbox.alert('Esta persona ya se encuentra asignada a una Oficina.');
                    return false;
                } else if (datos == 2) {
                    $('#Oficina_persona_id_jefe').val('');
                    $('#Oficina_primer_nombre').attr('readonly', false);
                    $('#Oficina_segundo_nombre').attr('readonly', false);
                    $('#Oficina_primer_apellido').attr('readonly', false);
                    $('#Oficina_segundo_apellido').attr('readonly', false);
                }
            } else {
                $('#Oficina_primer_nombre').val(datos.PRIMERNOMBRE);
                $('#Oficina_persona_id_jefe').val(datos.ID);
                $('#Oficina_segundo_nombre').val(datos.SEGUNDONOMBRE);
                $('#Oficina_primer_apellido').val(datos.PRIMERAPELLIDO);
                $('#Oficina_segundo_apellido').val(datos.SEGUNDOAPELLIDO);
                $('#Oficina_fechaNac').val(datos.FECHANACIMIENTO);
                $('#iconLoding').hide();
            }
        },
        error: function(datos) {
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
        success: function(datos) {
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
        error: function(datos) {
            bootbox.alert('Ocurrio un error');
        }

    });
}

function buscarPersonaAbogado(nacionalidad, cedula) {
    $('#Abogados_persona_id').val('');
    $('#Abogados_primer_nombre').val('');
    $('#Abogados_segundo_nombre').val('')
    $('#Abogados_primer_apellido').val('');
    $('#Abogados_segundo_apellido').val('');
    $('#Abogados_fecha_nac').val('');
    $('#Abogados_primer_nombre').attr('readonly', true);
    $('#Abogados_segundo_nombre').attr('readonly', true);
    $('#Abogados_primer_apellido').attr('readonly', true);
    $('#Abogados_segundo_apellido').attr('readonly', true);

    $('#iconLoding').show();

    if (nacionalidad == 'SELECCIONE') {
        bootbox.alert('Verifique que la nacionalidad no esten vacios');
        return false;
    }
    if (cedula == '') {
        bootbox.alert('Verifique que la cédula no esten vacios');
        return false;
    }
    $.ajax({
        url: baseUrl + "/ValidacionJs/BuscarPersonaAbogado",
        async: true,
        type: 'POST',
        data: 'nacionalidad=' + nacionalidad + '&cedula=' + cedula,
        dataType: 'json',
        success: function(datos) {

            if (datos == 1) {
                $('#iconLoding').hide();
                $('#Abogados_persona_id').val('');
                $('#Abogados_primer_nombre').val('');
                $('#Abogados_segundo_nombre').val('');
                $('#Abogados_primer_apellido').val('');
                $('#Abogados_segundo_apellido').val('');
                $('#Abogados_fecha_nac').val('');
                bootbox.alert('La Persona ya se encuentra registrada como Abogado.');
            } else if (datos == 2) {
                $('#iconLoding').hide();
                $('#Abogados_persona_id').val('');
                $('#Abogados_primer_nombre').attr('readonly', false);
                $('#Abogados_segundo_nombre').attr('readonly', false);
                $('#Abogados_primer_apellido').attr('readonly', false);
                $('#Abogados_segundo_apellido').attr('readonly', false);
                $('#Abogados_fecha_nac').val('');
                bootbox.alert('La Persona no se encuentra registrada en el Saime.');
            } else {
                $('#Abogados_persona_id').val(datos.ID);
                $('#Abogados_primer_nombre').val(datos.PRIMERNOMBRE);
                $('#Abogados_segundo_nombre').val(datos.SEGUNDONOMBRE);
                $('#Abogados_primer_apellido').val(datos.PRIMERAPELLIDO);
                $('#Abogados_segundo_apellido').val(datos.SEGUNDOAPELLIDO);
                $('#Abogados_fecha_nac').val(datos.FECHANACIMIENTO);
                $('#iconLoding').hide();
            }

        },
        error: function(datos) {
            bootbox.alert('Ocurrio un error');
        }
    })
}



/* --------------------------------------------- */


function buscarPersonaBeneficiarioTemp(nacionalidad, cedula) {

    if (nacionalidad == 'SELECCIONE') {
        bootbox.alert('Verifique que la nacionalidad no esten vacios');
        return false;
    }
    if (cedula == '') {
        bootbox.alert('Verifique que la cédula no esten vacios');
        return false;
    }


    $.ajax({
        url: baseUrl + "/ValidacionJs/BuscarPersonasBeneficiarioTemp",
        async: true,
        type: 'POST',
        data: 'nacionalidad=' + nacionalidad + '&cedula=' + cedula,
        dataType: 'json',
        success: function(datos) {

            if (datos == 2) {
                //  No Existe en Saime habilito todos los campos para que se llenen a pedal

                /*  ------  Bloqueo campos    ------- */

                $('#BeneficiarioTemporal_primer_apellido').attr('readonly', false);
                $('#BeneficiarioTemporal_primer_apellido').val('');

                $('#BeneficiarioTemporal_segundo_apellido').attr('readonly', false);
                $('#BeneficiarioTemporal_segundo_apellido').val('');

                $('#BeneficiarioTemporal_primer_nombre').attr('readonly', false);
                $('#BeneficiarioTemporal_primer_nombre').val('');

                $('#BeneficiarioTemporal_segundo_nombre').attr('readonly', false);
                $('#BeneficiarioTemporal_segundo_nombre').val('');

                $('#BeneficiarioTemporal_fecha_nacimiento').attr('readonly', false);
                $('#BeneficiarioTemporal_fecha_nacimiento').val('');

                $('#BeneficiarioTemporal_sexo').attr('disabled', false);
                $('#BeneficiarioTemporal_sexo').val('');

                $('#BeneficiarioTemporal_estado_civil').attr('readonly', false);
                $('#BeneficiarioTemporal_estado_civil').val('');

                $('#BeneficiarioTemporal_telf_habitacion').attr('readonly', false);
                $('#BeneficiarioTemporal_telf_habitacion').val('');

                $('#BeneficiarioTemporal_telf_celular').attr('readonly', false);
                $('#BeneficiarioTemporal_telf_celular').val('');

                $('#BeneficiarioTemporal_correo_electronico').attr('readonly', false);
                $('#BeneficiarioTemporal_correo_electronico').val('');

                /*   -------------------------------- */

            } else if (datos == 3) {
                bootbox.alert('Beneficiario Se encuentra Registrado !');
                // $('#BeneficiarioTemporal_cedula').val('');
                return false;

            } else if (datos.PROCEDENCIA == 2) {
                //  Datos de la variable proceden de Saime 
                // alert('entrooo');
                if (datos.PRIMERNOMBRE == null) {
                    $('#BeneficiarioTemporal_primer_nombre').attr('readonly', false);
                    $('#BeneficiarioTemporal_primer_nombre').val('');
                } else {
                    $('#BeneficiarioTemporal_primer_nombre').val(datos.PRIMERNOMBRE);
                    $('#BeneficiarioTemporal_primer_nombre').attr('readonly', true);
                }

                if (datos.SEGUNDONOMBRE == null) {
                    $('#BeneficiarioTemporal_segundo_nombre').attr('readonly', false);
                    $('#BeneficiarioTemporal_segundo_nombre').val('');
                } else {
                    $('#BeneficiarioTemporal_segundo_nombre').val(datos.SEGUNDONOMBRE);
                    $('#BeneficiarioTemporal_segundo_nombre').attr('readonly', true);
                }

                if (datos.PRIMERAPELLIDO == null) {
                    $('#BeneficiarioTemporal_primer_apellido').attr('readonly', false);
                    $('#BeneficiarioTemporal_primer_apellido').val('');
                } else {
                    $('#BeneficiarioTemporal_primer_apellido').val(datos.PRIMERAPELLIDO);
                    $('#BeneficiarioTemporal_primer_apellido').attr('readonly', true);
                }

                if (datos.SEGUNDOAPELLIDO == null) {
                    $('#BeneficiarioTemporal_segundo_apellido').attr('readonly', false);
                    $('#BeneficiarioTemporal_segundo_apellido').val('');
                } else {
                    $('#BeneficiarioTemporal_segundo_apellido').val(datos.SEGUNDOAPELLIDO);
                    $('#BeneficiarioTemporal_segundo_apellido').attr('readonly', true);
                }

                if (datos.FECHANACIMIENTO == null) {
                    $('#BeneficiarioTemporal_fecha_nacimiento').attr('readonly', false);
                    $('#BeneficiarioTemporal_fecha_nacimiento').val('');
                } else {
                    $('#BeneficiarioTemporal_fecha_nacimiento').val(datos.FECHANACIMIENTO);
                    $('#BeneficiarioTemporal_fecha_nacimiento').attr('readonly', true);
                }

                //  habilito los campos que se llenan en persona
                $('#BeneficiarioTemporal_sexo').attr('readonly', false);
                $('#BeneficiarioTemporal_sexo').attr('disabled', false);

                $('#BeneficiarioTemporal_estado_civil').attr('disabled', false);
                $('#BeneficiarioTemporal_estado_civil').attr('readonly', false);
                $('#BeneficiarioTemporal_estado_civil').val('');

                $('#BeneficiarioTemporal_telf_habitacion').attr('readonly', false);
                $('#BeneficiarioTemporal_telf_habitacion').val('');

                $('#BeneficiarioTemporal_telf_celular').attr('readonly', false);
                $('#BeneficiarioTemporal_telf_celular').val('');

                $('#BeneficiarioTemporal_correo_electronico').attr('readonly', false);
                $('#BeneficiarioTemporal_correo_electronico').val('');

            } else if (datos.PROCEDENCIA == 1) {
                // Datos de la variable proceden de Persona si algun campo esta en blanco de puede actualizar solo una vez
                $('#BeneficiarioTemporal_primer_nombre').val(datos.PRIMERNOMBRE);

                $('#BeneficiarioTemporal_segundo_nombre').val(datos.SEGUNDONOMBRE);
                $('#BeneficiarioTemporal_primer_apellido').val(datos.PRIMERAPELLIDO);
                $('#BeneficiarioTemporal_segundo_apellido').val(datos.SEGUNDOAPELLIDO);
                $('#BeneficiarioTemporal_persona_id').val(datos.ID);

                if (datos.FECHANACIMIENTO == null) {
                    $('#BeneficiarioTemporal_fecha_nacimiento').attr('readonly', false);
                    $('#BeneficiarioTemporal_fecha_nacimiento').val('');
                } else {
                    $('#BeneficiarioTemporal_fecha_nacimiento').val(datos.FECHANACIMIENTO);
                    $('#BeneficiarioTemporal_fecha_nacimiento').attr('readonly', true);
                }


                if (datos.SEXO == null) {
                    $('#BeneficiarioTemporal_sexo').attr('readonly', false);
                    $('#BeneficiarioTemporal_sexo').val('');
                } else {
                    $('#BeneficiarioTemporal_sexo').val(datos.SEXO);
                    $('#BeneficiarioTemporal_sexo').attr('readonly', true);
                }

                if (datos.EDO_CIVIL == null) {
                    $('#BeneficiarioTemporal_estado_civil').attr('readonly', false);
                    $('#BeneficiarioTemporal_estado_civil').attr('disabled', false);
                    $('#BeneficiarioTemporal_estado_civil').val('');
                } else {
                    $('#BeneficiarioTemporal_estado_civil').val(datos.EDO_CIVIL);
                    $('#BeneficiarioTemporal_estado_civil').attr('readonly', true);
                }

                if (datos.TELEFONO_HAB == null) {
                    $('#BeneficiarioTemporal_telf_habitacion').attr('readonly', false);
                    $('#BeneficiarioTemporal_telf_habitacion').val('');
                } else {
                    $('#BeneficiarioTemporal_telf_habitacion').val(datos.TELEFONO_HAB);
                    $('#BeneficiarioTemporal_telf_habitacion').attr('readonly', true);
                }

                if (datos.TELEFONO_MOVIL == null) {
                    $('#BeneficiarioTemporal_telf_celular').attr('readonly', false);
                    $('#BeneficiarioTemporal_telf_celular').val('');
                } else {
                    $('#BeneficiarioTemporal_telf_celular').val(datos.TELEFONO_MOVIL);
                    $('#BeneficiarioTemporal_telf_celular').attr('readonly', true);
                }



                if (datos.CORREO == null) {
                    $('#BeneficiarioTemporal_correo_electronico').attr('readonly', false);
                    $('#BeneficiarioTemporal_correo_electronico').val('');
                } else {
                    $('#BeneficiarioTemporal_correo_electronico').val(datos.CORREO_PRINCIPAL);
                    $('#BeneficiarioTemporal_correo_electronico').attr('readonly', true);
                }

            } // fin If principal



//



//                
//            }
        },
        error: function(datos) {
            bootbox.alert('CEDULA NO ES VALIDA VERIFIQUE');
        }
    })


}

/*  +++++++++++++++++++++++++++++++++++++++++++++ */




/*  /////////////////  PARA CENSO ////////////////////// */
function buscarBeneficiarioTemporal(nacionalidad, cedula) {

    if (nacionalidad == '') {
        bootbox.alert('Verifique que la nacionalidad no esten vacios');
        return false;
    }

    if (cedula == '') {
        bootbox.alert('Verifique que la cédula no esten vacios');
        return false;
    }

    $.ajax({
        url: baseUrl + "/ValidacionJs/BuscarPersonasBeneficiario",
        async: true,
        type: 'POST',
        data: 'nacionalidad=' + nacionalidad + '&cedula=' + cedula,
        dataType: 'json',
        success: function(datos) {
            /* ++++ solo verifico en Persona  ++++  */
            if (datos != 2) {
                //datos de beneficiario temporal
                $('#Beneficiario_primer_nombre').val(datos.persona.PRIMERNOMBRE);
                $('#Beneficiario_segundo_nombre').val(datos.persona.SEGUNDONOMBRE);
                $('#Beneficiario_primer_apellido').val(datos.persona.PRIMERAPELLIDO);
                $('#Beneficiario_segundo_apellido').val(datos.persona.SEGUNDOAPELLIDO);
                $('#Beneficiario_fecha_nacimiento').val(datos.persona.FECHANACIMIENTO);
                $('#Beneficiario_sexo').val(datos.persona.SEXO);
                $('#Beneficiario_estado_civil').val(datos.persona.EDOCIVIL);
                $('#Beneficiario_telf_habitacion').val(datos.persona.TELEFONOHAB);
                $('#Beneficiario_telf_celular').val(datos.persona.TELEFONOMOVIL);
                $('#Beneficiario_correo_electronico').val(datos.persona.CORREO);
                //datos de desarrollo 
                $('#Beneficiario_estado').val(datos.desarrollo.estado);
                $('#Beneficiario_municipio').val(datos.desarrollo.municipio);
                $('#Beneficiario_parroquia').val(datos.desarrollo.parroquia_id);
                $('#Beneficiario_nombre_desarrollo').val(datos.desarrollo.nombre);
                $('#Desarrollo_urban_barrio').val(datos.desarrollo.urban_barrio);
                $('#Desarrollo_av_call_esq_carr').val(datos.desarrollo.av_call_esq_carr);
                $('#Desarrollo_zona').val(datos.desarrollo.zona);
                $('#Desarrollo_lote_terreno_mt2').val(datos.desarrollo.lote_terreno_mt2);
                $('#Beneficiario_nomb_edif').val(datos.desarrollo.nomb_edif);
                $('#Beneficiario_piso').val(datos.desarrollo.nro_piso);
                $('#Beneficiario_numero_vivienda').val(datos.desarrollo.nro_vivienda);
                $('#Beneficiario_tipo_vivienda').val(datos.desarrollo.tipo_vivienda_id);
                $('#Beneficiario_beneficiario_temporal_id').val(datos.desarrollo.Temp);

            } else {

                bootbox.alert('Disculpe.Esta persona no se encuentra Adjudicada a una vivienda');

            }
        }

    });


}

/* ////////////////////////////////////////////// */


//function buscarPersonaBeneficiario(nacionalidad, cedula) {
//
//    if (nacionalidad == 'SELECCIONE') {
//        bootbox.alert('Verifique que la nacionalidad no esten vacios');
//        return false;
//    }
//    if (cedula == '') {
//        bootbox.alert('Verifique que la cédula no esten vacios');
//        return false;
//    }
//
//
//    $.ajax({
//        url: baseUrl + "/ValidacionJs/BuscarPersonasBeneficiario",
//        async: true,
//        type: 'POST',
//        data: 'nacionalidad=' + nacionalidad + '&cedula=' + cedula,
//        dataType: 'json',
//        success: function (datos) {
//
//            //  alert(datos); 
//
////            if (datos == 1) {
////                bootbox.alert('Debe Completar el campo Cédula');
////            } else {
////
//
//            $('#Beneficiario_primer_nombre').val(datos.PRIMERNOMBRE);
//            $('#Beneficiario_segundo_nombre').val(datos.SEGUNDONOMBRE);
//            $('#Beneficiario_primer_apellido').val(datos.PRIMERAPELLIDO);
//            $('#Beneficiario_segundo_apellido').val(datos.SEGUNDOAPELLIDO);
//            $('#Beneficiario_fecha_nacimiento').val(datos.FECHANACIMIENTO);
//
//            if (datos.SEXO == null) {
//                $('#Beneficiario_sexo').attr('readonly', false);
//            } else {
//                $('#Beneficiario_sexo').val(datos.SEXO);
//                $('#Beneficiario_sexo').attr('readonly', true);
//            }
//
//            if (datos.EDO_CIVIL == null) {
//                $('#Beneficiario_estado_civil').attr('readonly', false);
//            } else {
//                $('#Beneficiario_estado_civil').val(datos.EDO_CIVIL);
//                $('#Beneficiario_estado_civil').attr('readonly', true);
//            }
//
//            if (datos.TELEFONO_HAB == null) {
//                $('#Beneficiario_telf_habitacion').attr('readonly', false);
//            } else {
//                $('#Beneficiario_telf_habitacion').val(datos.TELEFONO_HAB);
//                $('#Beneficiario_telf_habitacion').attr('readonly', true);
//            }
//            if (datos.TELEFONO_MOVIL == null) {
//                $('#Beneficiario_telf_celular').attr('readonly', false);
//            } else {
//                $('#Beneficiario_telf_celular').val(datos.TELEFONO_MOVIL);
//                $('#Beneficiario_telf_celular').attr('readonly', true);
//            }
//
//            if (datos.CORREO == null) {
//                $('#Beneficiario_correo_electronico').attr('readonly', false);
//            } else {
//                $('#Beneficiario_correo_electronico').val(datos.CORREO_PRINCIPAL);
//                $('#Beneficiario_correo_electronico').attr('readonly', true);
//            }
//
//
//
////            }
//        },
//        error: function (datos) {
//            bootbox.alert('CEDULA NO ES VALIDA VERIFIQUE');
//        }
//    })
//
//
//}




/*  -------------------------------------------- */


function buscarPersonaAsignacionCenso(nacionalidad, cedula) {
    $('#iconLoding').show();
    $('#AsignacionCenso_persona_id').val('');
    $('#AsignacionCenso_primer_nombre').val('');
    $('#AsignacionCenso_segundo_nombre').val('');
    $('#AsignacionCenso_primer_apellido').val('');
    $('#AsignacionCenso_segundo_apellido').val('');
    $('#AsignacionCenso_fecha_nac').val('');
    $('#AsignacionCenso_primer_nombre').attr('readonly', true);
    $('#AsignacionCenso_segundo_nombre').attr('readonly', true);
    $('#AsignacionCenso_primer_apellido').attr('readonly', true);
    $('#AsignacionCenso_segundo_apellido').attr('readonly', true);

    if (nacionalidad == 'SELECCIONE') {
        bootbox.alert('Verifique que la nacionalidad no esten vacios');
        return false;
    }
    if (cedula == '') {
        bootbox.alert('Verifique que la cédula no esten vacios');
        return false;
    }
    $.ajax({
        url: baseUrl + "/ValidacionJs/BuscarPersonaAsignacionCenso",
        async: true,
        type: 'POST',
        data: 'nacionalidad=' + nacionalidad + '&cedula=' + cedula,
        dataType: 'json',
        success: function(datos) {


            if (datos == 1) {
                $('#iconLoding').hide();
                $('#AsignacionCenso_persona_id').val('');
                $('#AsignacionCenso_primer_nombre').val('');
                $('#AsignacionCenso_segundo_nombre').val('');
                $('#AsignacionCenso_primer_apellido').val('');
                $('#AsignacionCenso_segundo_apellido').val('');
                $('#AsignacionCenso_fecha_nac').val('');
                bootbox.alert('La Persona ya se encuentra Asignada aun censo.');
            } else if (datos == 2) {
                $('#iconLoding').hide();
                $('#AsignacionCenso_persona_id').val('');
                $('#AsignacionCenso_primer_nombre').attr('readonly', false);
                $('#AsignacionCenso_segundo_nombre').attr('readonly', false);
                $('#AsignacionCenso_primer_apellido').attr('readonly', false);
                $('#AsignacionCenso_segundo_apellido').attr('readonly', false);
                $('#AsignacionCenso_fecha_nac').val('');
                bootbox.alert('La Persona no se encuentra registrada en el Saime.');
            } else {
                $('#AsignacionCenso_persona_id').val(datos.ID);
                $('#AsignacionCenso_primer_nombre').val(datos.PRIMERNOMBRE);
                $('#AsignacionCenso_segundo_nombre').val(datos.SEGUNDONOMBRE);
                $('#AsignacionCenso_primer_apellido').val(datos.PRIMERAPELLIDO);
                $('#AsignacionCenso_segundo_apellido').val(datos.SEGUNDOAPELLIDO);
                $('#AsignacionCenso_fecha_nac').val(datos.FECHANACIMIENTO);
                $('#iconLoding').hide();
            }

        },
        error: function(datos) {
            bootbox.alert('Ocurrio un error');
        }
    })
}


/* -------------------------------------------------------*/

function buscarPersonaFamiliar(nacionalidad, cedula) {
    $('#GrupoFamiliar_primer_nombre').val('');
    $('#GrupoFamiliar_segundor_nombre').val('');
    $('#GrupoFamiliar_persona_id').val('');
    $('#GrupoFamiliar_primer_apellido').val('');
    $('#GrupoFamiliar_segundo_apellido').val('');
    $('#GrupoFamiliar_fecha_nacimiento').val('');
    if (nacionalidad == 'SELECCIONE') {
        bootbox.alert('Verifique que la nacionalidad no esten vacios');
        return false;
    }
    if (cedula == '') {
        bootbox.alert('Verifique que la cédula no esten vacios');
        return false;
    }
    $('#iconLoding').show();
    $.ajax({
        url: baseUrl + "/ValidacionJs/BuscarPersonasFamiliar",
        async: true,
        type: 'POST',
        data: 'nacionalidad=' + nacionalidad + '&cedula=' + cedula,
        dataType: 'json',
        success: function(datos) {

            if (datos == 1) {
                $('#iconLoding').hide();
                $('#GrupoFamiliar_primer_nombre').val('');
                $('#GrupoFamiliar_segundo_nombre').val('');
                $('#GrupoFamiliar_persona_id').val('');
                $('#GrupoFamiliar_primer_apellido').val('');
                $('#GrupoFamiliar_segundo_apellido').val('');
                $('#GrupoFamiliar_fecha_nacimiento').val('');
                $('#GrupoFamiliar_cedula').val('');
                $('#GrupoFamiliar_ingreso_mensual_faov').val('');
                bootbox.alert('La Persona ya se encuentra asignada a un grupo Familiar.');
            } else if (datos == 2) {
                $('#iconLoding').hide();
                $('#GrupoFamiliar_primer_nombre').val('');
                $('#GrupoFamiliar_cedula').val('');
                $('#GrupoFamiliar_segundo_nombre').val('');
                $('#GrupoFamiliar_persona_id').val('');
                $('#GrupoFamiliar_primer_apellido').val('');
                $('#GrupoFamiliar_segundo_apellido').val('');
                $('#GrupoFamiliar_fecha_nacimiento').val('');
                $('#GrupoFamiliar_ingreso_mensual_faov').val('');
                bootbox.alert('La Persona no se encuentra registrada en el Saime.');
            } else {
                $('#GrupoFamiliar_persona_id').val(datos.persona.ID);
                $('#GrupoFamiliar_primer_nombre').val(datos.persona.PRIMERNOMBRE);
                $('#GrupoFamiliar_segundo_nombre').val(datos.persona.SEGUNDONOMBRE);
                $('#GrupoFamiliar_primer_apellido').val(datos.persona.PRIMERAPELLIDO);
                $('#GrupoFamiliar_segundo_apellido').val(datos.persona.SEGUNDOAPELLIDO);
                $('#GrupoFamiliar_fecha_nacimiento').val(datos.persona.FECHANACIMIENTO);
                $('#GrupoFamiliar_ingreso_mensual_faov').val(datos.faov);
                $('#iconLoding').hide();
            }
        },
        error: function(datos) {
            bootbox.alert('Ocurrio un error');
        }
    })
}

/*
 * FUNCTION QUE VALIDA CANTIDAD DE PERENTEZCO 
 */

function Parentesco(valor) {

    if ($('#Familiar_cedula_familiar').val() == '') {
        bootbox.alert('Ingrese un número de cédula!');
        $('#Familiar_parentesco').val('');
        return false;
    }

    contadorPadre = parseInt(0);
    contadorConyuge = parseInt(0);
    contadorMadre = parseInt(0);
    contadorSuegro = parseInt(0);
    contadorAbuelo = parseInt(0);
    $('#listado_familiar tr').each(function() {
        var parentesco = $(this).find('td:eq(6)').html();
        if (parentesco == 'PADRE') {
            contadorPadre++
        }
        if (parentesco == 'CONYUGE') {
            contadorConyuge++
        }
        if (parentesco == 'MADRE') {
            contadorMadre++
        }
        if (parentesco == 'SUEGRO(A)') {
            contadorSuegro++
        }
        if (parentesco == 'ABUELO(A)') {
            contadorAbuelo++
        }
    });


    if (valor == 'C') {
        if (contadorConyuge > 0) {
            bootbox.alert('Usted ya tiene registrado un Conyuge.');
            $('#Familiar_parentesco').val('');
            return false;
        }
    } else if (valor == 'M') {
        if (contadorMadre > 0) {
            bootbox.alert('Usted ya tiene registrado a su Madre.');
            $('#Familiar_parentesco').val('');
            return false;
        }
    } else if (valor == 'P') {
        if (contadorPadre > 0) {
            bootbox.alert('Usted ya tiene registrado a su Padre.');
            $('#Familiar_parentesco').val('');
            return false;
        }
    } else if (valor == 'S') {
        if (contadorSuegro >= 2) {
            bootbox.alert('Usted ya posee asociado dos Suegros.');
            $('#Familiar_parentesco').val('');
            return false;
        }
    } else if (valor == 'A') {
        if (contadorAbuelo >= 4) {
            bootbox.alert('Usted ya posee asociado cuatro Abuelos.');
            $('#Familiar_parentesco').val('');
            return false;
        }
    }

}

