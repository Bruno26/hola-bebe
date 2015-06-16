
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
        url: baseUrl + "/ValidacionJs/BuscarPersonas",
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
            if (datos == 1) {
                $('#Oficina_primer_nombre').val(datos.PRIMERNOMBRE);
                $('#Oficina_persona_id_jefe').val(datos.ID);
                $('#Oficina_segundo_nombre').val(datos.SEGUNDONOMBRE);
                $('#Oficina_primer_apellido').val(datos.PRIMERAPELLIDO);
                $('#Oficina_segundo_apellido').val(datos.SEGUNDOAPELLIDO);
            } else {
                $('#Oficina_primer_nombre').val(datos.PRIMERNOMBRE);
                $('#Oficina_persona_id_jefe').val(datos.ID);
                $('#Oficina_segundo_nombre').val(datos.SEGUNDONOMBRE);
                $('#Oficina_primer_apellido').val(datos.PRIMERAPELLIDO);
                $('#Oficina_segundo_apellido').val(datos.SEGUNDOAPELLIDO);
            }

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
        url: baseUrl + "/ValidacionJs/BuscarPersonas",
        async: true,
        type: 'POST',
        data: 'nacionalidad=' + nacionalidad + '&cedula=' + cedula,
        dataType: 'json',
        success: function (datos) {

            if (datos == 1) {
                $('#Abogados_primer_nombre').val(datos.PRIMERNOMBRE);
                $('#Abogados_persona_id').val(datos.ID);
                $('#Abogados_primer_apellido').val(datos.PRIMERAPELLIDO);
            } else {
                $('#Abogados_primer_nombre').val(datos.PRIMERNOMBRE);
                $('#Abogados_persona_id').val(datos.ID);
                $('#Abogados_primer_apellido').val(datos.PRIMERAPELLIDO);
            }

        },
        error: function (datos) {
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
        url: baseUrl + "/ValidacionJs/BuscarPersonasBeneficiario",
        async: true,
        type: 'POST',
        data: 'nacionalidad=' + nacionalidad + '&cedula=' + cedula,
        dataType: 'json',
        success: function (datos) {

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

            } else if (datos.PROCEDENCIA == 2) {
                //  Datos de la variable proceden de Saime 
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

                if (datos.EDO_CIVIL === null) {
                    $('#BeneficiarioTemporal_estado_civil').attr('readonly', false);
                    $('#BeneficiarioTemporal_estado_civil').val('');
                } else {
                    $('#BeneficiarioTemporal_estado_civil').val(datos.EDO_CIVIL);
                    $('#BeneficiarioTemporal_estado_civil').attr('readonly', true);
                }

                if (datos.TELEFONO_HAB === null) {
                    $('#BeneficiarioTemporal_telf_habitacion').attr('readonly', false);
                    $('#BeneficiarioTemporal_telf_habitacion').val('');
                } else {
                    $('#BeneficiarioTemporal_telf_habitacion').val(datos.TELEFONO_HAB);
                    $('#BeneficiarioTemporal_telf_habitacion').attr('readonly', true);
                }

                if (datos.TELEFONO_MOVIL === null) {
                    $('#BeneficiarioTemporal_telf_celular').attr('readonly', false);
                    $('#BeneficiarioTemporal_telf_celular').val('');
                } else {
                    $('#BeneficiarioTemporal_telf_celular').val(datos.TELEFONO_MOVIL);
                    $('#BeneficiarioTemporal_telf_celular').attr('readonly', true);
                }



                if (datos.CORREO === null) {
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
        error: function (datos) {
            bootbox.alert('CEDULA NO ES VALIDA VERIFIQUE');
        }
    })


}

/*  +++++++++++++++++++++++++++++++++++++++++++++ */


/*  /////////////////  PARA CENSO ////////////////////// */
function buscarBeneficiarioTemporal(nacionalidad, cedula) {

    if (nacionalidad == 'SELECCIONE') {
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
        success: function (datos) {
                                      /* ++++ solo verifico en Persona  ++++  */

                                        if (datos.PROCEDENCIA == 1) {
                                                                                                                                                                                                                                                                                       // Datos de la variable proceden de Persona si algun campo esta en blanco de puede actualizar solo una vez
                                                                        $('#Beneficiario_primer_nombre').val(datos.PRIMERNOMBRE);

                                                                        $('#Beneficiario_segundo_nombre').val(datos.SEGUNDONOMBRE);
                                                                        $('#Beneficiario_primer_apellido').val(datos.PRIMERAPELLIDO);
                                                                        $('#Beneficiario_segundo_apellido').val(datos.SEGUNDOAPELLIDO);
                                                                        $('#Beneficiario_persona_id').val(datos.ID);

                                                                        $('#Beneficiario_fecha_nacimiento').val(datos.FECHANACIMIENTO);
                                                                        
                                                                        $('#Beneficiario_sexo').val(datos.SEXO);
                                                                        
                                                                        $('#Beneficiario_estado_civil').val(datos.EDO_CIVIL);
                                                                              
                                                                            $('#Beneficiario_telf_habitacion').val(datos.TELEFONO_HAB);

                                                                            $('#Beneficiario_telf_celular').val(datos.TELEFONO_MOVIL);
                                                                           
                                                                            $('#Beneficiario_correo_electronico').val(datos.CORREO_PRINCIPAL);
                                                                            
                                                                    }else{

                                                                         bootbox.alert('Cedula No Pertenece a un Beneficiario Temporal');
                                                                    }

                                      /* +++++++++++++++++++++++++++++++++++  */

                                  }

        });                          



   /*  -------- */

    $.ajax({
        url: baseUrl + "/ValidacionJs/BuscarBeneficiarioTemp",
        async: true,
        type: 'POST',
        data: 'nacionalidad=' + nacionalidad + '&cedula=' + cedula,
        dataType: 'json',
        success: function (datos) {


   
        },
        error: function (datos) {
          //  bootbox.alert('Ocurrio un error');
        }
    });  

}

/* ////////////////////////////////////////////// */





function buscarPersonaBeneficiario(nacionalidad, cedula) {

    if (nacionalidad == 'SELECCIONE') {
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
        success: function (datos) {

            //  alert(datos); 

//            if (datos == 1) {
//                bootbox.alert('Debe Completar el campo Cédula');
//            } else {
//

            $('#Beneficiario_primer_nombre').val(datos.PRIMERNOMBRE);
            $('#Beneficiario_segundo_nombre').val(datos.SEGUNDONOMBRE);
            $('#Beneficiario_primer_apellido').val(datos.PRIMERAPELLIDO);
            $('#Beneficiario_segundo_apellido').val(datos.SEGUNDOAPELLIDO);
            $('#Beneficiario_fecha_nacimiento').val(datos.FECHANACIMIENTO);

            if (datos.SEXO == null) {
                $('#Beneficiario_sexo').attr('readonly', false);
            } else {
                $('#Beneficiario_sexo').val(datos.SEXO);
                $('#Beneficiario_sexo').attr('readonly', true);
            }

            if (datos.EDO_CIVIL == null) {
                $('#Beneficiario_estado_civil').attr('readonly', false);
            } else {
                $('#Beneficiario_estado_civil').val(datos.EDO_CIVIL);
                $('#Beneficiario_estado_civil').attr('readonly', true);
            }

            if (datos.TELEFONO_HAB == null) {
                $('#Beneficiario_telf_habitacion').attr('readonly', false);
            } else {
                $('#Beneficiario_telf_habitacion').val(datos.TELEFONO_HAB);
                $('#Beneficiario_telf_habitacion').attr('readonly', true);
            }
            if (datos.TELEFONO_MOVIL == null) {
                $('#Beneficiario_telf_celular').attr('readonly', false);
            } else {
                $('#Beneficiario_telf_celular').val(datos.TELEFONO_MOVIL);
                $('#Beneficiario_telf_celular').attr('readonly', true);
            }

            if (datos.CORREO == null) {
                $('#Beneficiario_correo_electronico').attr('readonly', false);
            } else {
                $('#Beneficiario_correo_electronico').val(datos.CORREO_PRINCIPAL);
                $('#Beneficiario_correo_electronico').attr('readonly', true);
            }



//            }
        },
        error: function (datos) {
            bootbox.alert('CEDULA NO ES VALIDA VERIFIQUE');
        }
    })


}




/*  -------------------------------------------- */

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
        url: baseUrl + "/ValidacionJs/BuscarPersonas",
        async: true,
        type: 'POST',
        data: 'nacionalidad=' + nacionalidad + '&cedula=' + cedula,
        dataType: 'json',
        success: function (datos) {

            if (datos == 1) {

                $('#AsignacionCenso_primer_nombre').val(datos.PRIMERNOMBRE);
                $('#AsignacionCenso_persona_id').val(datos.ID);
                $('#AsignacionCenso_primer_apellido').val(datos.PRIMERAPELLIDO);
            } else {
                $('#AsignacionCenso_primer_nombre').val(datos.PRIMERNOMBRE);
                $('#AsignacionCenso_persona_id').val(datos.ID);
                $('#AsignacionCenso_primer_apellido').val(datos.PRIMERAPELLIDO);
            }

        },
        error: function (datos) {
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
        success: function (datos) {

            if (datos == 1) {
                $('#iconLoding').hide();
                $('#GrupoFamiliar_primer_nombre').val('');
                $('#GrupoFamiliar_segundor_nombre').val('');
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
        error: function (datos) {
            bootbox.alert('Ocurrio un error');
        }
    })
}
