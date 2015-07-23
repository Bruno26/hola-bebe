<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$pdf = Yii::createComponent('application.vendors.mpdf.mpdf');

function nombre($selec, $iD) {
    $saime = ConsultaOracle::getPersonaByPk($selec, (int) $iD);
    return $saime['PRIMER_NOMBRE'];
}

function apellido($selec, $iD) {
    $saime = ConsultaOracle::getPersonaByPk($selec, (int) $iD);
    return $saime['PRIMER_APELLIDO'];
}

function nacionalidadCedula($selec, $select2, $iD) {
    $saime = ConsultaOracle::getNacionalidadCedulaPersonaByPk($selec, $select2, (int) $iD);
    return $saime['NACIONALIDAD'] . " - " . $saime['CEDULA'];
}

$parentesco = Maestro::FindMaestrosByPadreSelect(149);
$html.='<style>
            p.saltodepagina{
                page-break-after: always;
            }
            #prueba{
               border:2px solid;
               border-radius:10px;
            } 
            .subtitulo{
               font-weight: bold;
            }

            table{
                width: 100%;
            }
            td.border{
                border-bottom: 1pt solid black;
            }
            td.border-right{
                border-right: 1pt solid black;
            }
            td.col-interno{
                width: 33%;
                border-bottom: 1pt solid black;
            }
            
    .uno {
        
        width: 50%;
    }
   
        </style>';
foreach ($recordBeneTemp as $model) {
    $cabecera = '<img src="' . Yii::app()->request->baseUrl . '/images/cintillo.jpg"/>';
    $persona = (object) ConsultaOracle::getPersonaBeneficiario($model->nacionalidad, $model->cedula);
//    echo '<pre>';var_dump($persona);die();
    $html.="<div>"
            . "<table>"
            . "<tr>"
            . "<td align='left'><b><font size='6' color='#B40404'>"
            . "Adjudicado:</font><font size='5'> " . nombre('PRIMER_NOMBRE', $model->persona_id) . " " . apellido('PRIMER_APELLIDO', $model->persona_id) . " <br/>Fecha de Adjudicación: " . date('d/m/Y', strtotime($model->fecha_creacion)) .
            "<br/>Fecha de Censo: _______________________ " . " <br/>Condición Unidad Familiar:</font> <font size='3'><br/><label>Organo Estadal de Vivienda<input type='checkbox'></label>&nbsp;&nbsp;<label>Censo Refugiados<input type='checkbox'>&nbsp;&nbsp;Censo GMVV</label><label><input type='checkbox'></label>&nbsp;&nbsp;<label>Caso Especial<input type='checkbox'></label></font>"
            . "</td>"
            . "<td align='right'><img src='" . Yii::app()->baseUrl . "/images/LOGO_BANAVIH-1.jpg' style='width: 25%;'/></td>"
            . "</tr>"
            . "</table>"
            . "</div>"
            . "<br/>"
            . "<div style='margin-top:1%'></div><br><br><br>";
    $html.="<br/>"
            . "<div id='prueba'>"
            . "<table class='table table-striped' border='0'>"
            . "<tr>"
            . "<td colspan='3' align='center' class='border'><b>Datos Personales</b></td>"
            . "</tr>"
            . "<tr>
                <td class='col-interno border-right' colspan='2'>
                    <span class='subtitulo'>Rif:</span> <br>
                </td>
                <td class='col-interno' colspan='1'>
                    <span class='subtitulo'>Cédula:</span> " . nacionalidadCedula('NACIONALIDAD', 'CEDULA', $model->persona_id) . "<br>
                </td>
            </tr>"
            . "<tr>
                <td class='col-interno' colspan='3'>
                    <span class='subtitulo'>Nombre Completo:</span> " . $model->nombre_completo . "<br>
                </td>
            </tr>"
            . "<tr>
                <td class='col-interno   border-right'>
                    <span class='subtitulo'>Fecha de Nacimiento:</span> " . date('d/m/Y', strtotime($persona->FECHANACIMIENTO)) . "<br>
                </td>
                <td class='col-interno  border-right'>
                    <span class='subtitulo'>Sexo:</span> " . $persona->SEXO . "<br>
                </td>
                <td class='col-interno'>
                    <span class='subtitulo'>Estado Civil:</span> " . $persona->EDOCIVIL . "<br>
                </td>
            </tr>"
            . "<tr>
                <td class='border-right'>
                    <span class='subtitulo'>Teléfono Habitación:</span> " . $persona->TELEFONOHAB . "<br>
                </td>
                <td class='border-right'>
                    <span class='subtitulo'>Teléfono Celular:</span> " . $persona->TELEFONOMOVIL . "<br>
                </td>
                <td>
                    <span class='subtitulo'>Correo Electrónico:</span> " . $persona->CORREO . "<br>
                </td>
            </tr>"
            . "</table>"
            . "</div>";
    $html.="<br/><br/><br/>"
            . "<div id='prueba'>"
            . "<table class='table table-striped' border='0'>"
            . "<tr>"
            . "<td colspan='3' align='center' class='border'><b>Desarrollo: " . $model->desarrollo->nombre . " - " . $model->unidadHabitacional->nombre . "</b></td>"
            . "</tr>"
            . "<tr>
                <td class='col-interno border-right'>
                    <span class='subtitulo'>Estado:</span> " . $model->desarrollo->fkParroquia->clvmunicipio0->clvestado0->strdescripcion . "<br>
                </td>
                <td class='col-interno border-right'>
                    <span class='subtitulo'>Municipio:</span> " . $model->desarrollo->fkParroquia->clvmunicipio0->strdescripcion . "<br>
                </td>
                <td class='col-interno'>
                    <span class='subtitulo'>Parroquia:</span> " . $model->desarrollo->fkParroquia->strdescripcion . "<br>
                </td>
            </tr>"
            . "<tr>
                <td class='col-interno border-right' colspan='2'>
                    <span class='subtitulo'>Urbanización/Barrio:</span> " . $model->desarrollo->urban_barrio . "<br>
                </td>
                <td class='col-interno ' colspan='1'>
                    <span class='subtitulo'>Avenida/Calle/Esquina/Carretera:</span> " . $model->desarrollo->av_call_esq_carr . "<br>
                </td>
            </tr>"
            . "<tr>
                <td class='col-interno' colspan='3'>
                    <span class='subtitulo'>Zona:</span> " . $model->desarrollo->zona . "<br>
                </td>
            </tr>"
            . "<tr>
                <td colspan='2' style=' width: 50%;' class='col-interno border-right'>
                    <span class='subtitulo'>Tipo de Inmueble:</span> " . $model->unidadHabitacional->genTipoInmueble->descripcion . "<br>
                </td>
                <td class='col-interno '>
                    <span class='subtitulo'>Lote Terreno Mt2:</span> " . $model->desarrollo->lote_terreno_mt2 . "<br>
                </td>
            </tr>"
            . "<tr>
                <td class='border-right'>
                    <span class='subtitulo'>Piso:</span> " . $model->vivienda->nro_piso . "<br>
                </td>
                <td class='border-right'>
                    <span class='subtitulo'>N° de la Vivienda:</span> " . $model->vivienda->nro_vivienda . "<br>
                </td>
                <td style=' width: 50%;'>
                    <span class='subtitulo'>Área de Vivienda mt2:</span><br>
                </td>
            </tr>"
            . "</table>"
            . "</div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";

    //    ----------------------- GRUPO FAMILIAR --------------------------------

    $html.="<br/>"
            . "<div><h3 align='center'>Grupo Familiar</h3></div>"
            . "<div id='prueba'>"
            . "<table class='table table-striped' border='0'>"
            . "<tr>
                <td class='col-interno border-right'>
                    <span class='subtitulo'>Cédula: <label>V<input type='checkbox'></label> <label>E<input type='checkbox'></label></span><br>
                </td>
                <td colspan='2' class='col-interno'>
                    <span class='subtitulo'>Nombre Completo:</span><br>
                </td>
            </tr>"
            . "<tr>
                <td class='col-interno' colspan='3'>
                <span class='subtitulo'>Parentesco: </span><br>";
    $i = 0;
    foreach ($parentesco as $key => $value) {
        $html.=" <label>" . $value . "&nbsp;<input type='checkbox'></label>";
        $i++;
    }
    $html.="</td>
            </tr>"
            . "<tr>
                <td class='col-interno border-right'>
                    <span class='subtitulo'>Lote Terreno Mt2:</span> <br>
                </td>
                <td class='col-interno border-right'>
                    <span class='subtitulo'>Piso:</span><br>
                </td>
                <td class='col-interno'>
                    <span class='subtitulo'>N° de la Vivienda:</span> <br>
                </td>
            </tr>"
            . "<tr>
                <td colspan='2' style=' width: 50%;' class='border-right'>
                    <span class='subtitulo'>Tipo de Inmueble:</span> <br>
                </td>
                <td style=' width: 50%;'>
                    <span class='subtitulo'>Área de Vivienda mt2:</span><br>
                </td>
            </tr>"
            . "</table>"
            . "</div><br><br>";
    
    $html.="<br/>"
            . "<div id='prueba'>"
            . "<table class='table table-striped' border='0'>"
            . "<tr>
                <td class='col-interno border-right'>
                    <span class='subtitulo'>Cédula: <label>V<input type='checkbox'></label> <label>E<input type='checkbox'></label></span><br>
                </td>
                <td colspan='2' class='col-interno'>
                    <span class='subtitulo'>Nombre Completo:</span><br>
                </td>
            </tr>"
            . "<tr>
                <td class='col-interno' colspan='3'>
                <span class='subtitulo'>Parentesco: </span><br>";
    $i = 0;
    foreach ($parentesco as $key => $value) {
        $html.=" <label>" . $value . "&nbsp;<input type='checkbox'></label>";
        $i++;
    }
    $html.="</td>
            </tr>"
            . "<tr>
                <td class='col-interno border-right'>
                    <span class='subtitulo'>Lote Terreno Mt2:</span> <br>
                </td>
                <td class='col-interno border-right'>
                    <span class='subtitulo'>Piso:</span><br>
                </td>
                <td class='col-interno'>
                    <span class='subtitulo'>N° de la Vivienda:</span> <br>
                </td>
            </tr>"
            . "<tr>
                <td colspan='2' style=' width: 50%;' class='border-right'>
                    <span class='subtitulo'>Tipo de Inmueble:</span> <br>
                </td>
                <td style=' width: 50%;'>
                    <span class='subtitulo'>Área de Vivienda mt2:</span><br>
                </td>
            </tr>"
            . "</table>"
            . "</div><br><br>";
    
    $html.="<br/>"
            . "<div id='prueba'>"
            . "<table class='table table-striped' border='0'>"
            . "<tr>
                <td class='col-interno border-right'>
                    <span class='subtitulo'>Cédula: <label>V<input type='checkbox'></label> <label>E<input type='checkbox'></label></span><br>
                </td>
                <td colspan='2' class='col-interno'>
                    <span class='subtitulo'>Nombre Completo:</span><br>
                </td>
            </tr>"
            . "<tr>
                <td class='col-interno' colspan='3'>
                <span class='subtitulo'>Parentesco: </span><br>";
    $i = 0;
    foreach ($parentesco as $key => $value) {
        $html.=" <label>" . $value . "&nbsp;<input type='checkbox'></label>";
        $i++;
    }
    $html.="</td>
            </tr>"
            . "<tr>
                <td class='col-interno border-right'>
                    <span class='subtitulo'>Lote Terreno Mt2:</span> <br>
                </td>
                <td class='col-interno border-right'>
                    <span class='subtitulo'>Piso:</span><br>
                </td>
                <td class='col-interno'>
                    <span class='subtitulo'>N° de la Vivienda:</span> <br>
                </td>
            </tr>"
            . "<tr>
                <td colspan='2' style=' width: 50%;' class='border-right'>
                    <span class='subtitulo'>Tipo de Inmueble:</span> <br>
                </td>
                <td style=' width: 50%;'>
                    <span class='subtitulo'>Área de Vivienda mt2:</span><br>
                </td>
            </tr>"
            . "</table>"
            . "</div><br><br>";
    $html.="<br/>"
            . "<div id='prueba'>"
            . "<table class='table table-striped' border='0'>"
            . "<tr>
                <td class='col-interno border-right'>
                    <span class='subtitulo'>Cédula: <label>V<input type='checkbox'></label> <label>E<input type='checkbox'></label></span><br>
                </td>
                <td colspan='2' class='col-interno'>
                    <span class='subtitulo'>Nombre Completo:</span><br>
                </td>
            </tr>"
            . "<tr>
                <td class='col-interno' colspan='3'>
                <span class='subtitulo'>Parentesco: </span><br>";
    $i = 0;
    foreach ($parentesco as $key => $value) {
        $html.=" <label>" . $value . "&nbsp;<input type='checkbox'></label>";
        $i++;
    }
    $html.="</td>
            </tr>"
            . "<tr>
                <td class='col-interno border-right'>
                    <span class='subtitulo'>Lote Terreno Mt2:</span> <br>
                </td>
                <td class='col-interno border-right'>
                    <span class='subtitulo'>Piso:</span><br>
                </td>
                <td class='col-interno'>
                    <span class='subtitulo'>N° de la Vivienda:</span> <br>
                </td>
            </tr>"
            . "<tr>
                <td colspan='2' style=' width: 50%;' class='border-right'>
                    <span class='subtitulo'>Tipo de Inmueble:</span> <br>
                </td>
                <td style=' width: 50%;'>
                    <span class='subtitulo'>Área de Vivienda mt2:</span><br>
                </td>
            </tr>"
            . "</table>"
            . "</div><br><br>";
    $html.="<br/>"
            . "<div id='prueba'>"
            . "<table class='table table-striped' border='0'>"
            . "<tr>
                <td class='col-interno border-right'>
                    <span class='subtitulo'>Cédula: <label>V<input type='checkbox'></label> <label>E<input type='checkbox'></label></span><br>
                </td>
                <td colspan='2' class='col-interno'>
                    <span class='subtitulo'>Nombre Completo:</span><br>
                </td>
            </tr>"
            . "<tr>
                <td class='col-interno' colspan='3'>
                <span class='subtitulo'>Parentesco: </span><br>";
    $i = 0;
    foreach ($parentesco as $key => $value) {
        $html.=" <label>" . $value . "&nbsp;<input type='checkbox'></label>";
        $i++;
    }
    $html.="</td>
            </tr>"
            . "<tr>
                <td class='col-interno border-right'>
                    <span class='subtitulo'>Lote Terreno Mt2:</span> <br>
                </td>
                <td class='col-interno border-right'>
                    <span class='subtitulo'>Piso:</span><br>
                </td>
                <td class='col-interno'>
                    <span class='subtitulo'>N° de la Vivienda:</span> <br>
                </td>
            </tr>"
            . "<tr>
                <td colspan='2' style=' width: 50%;' class='border-right'>
                    <span class='subtitulo'>Tipo de Inmueble:</span> <br>
                </td>
                <td style=' width: 50%;'>
                    <span class='subtitulo'>Área de Vivienda mt2:</span><br>
                </td>
            </tr>"
            . "</table>"
            . "</div><br><br><br><br><br><br><br><br><br><br>";

//    -------------------------PLANILLA 2 ------------------------


    $html.="<br/>"
            . "<div id='prueba'>"
            . "<table class='table table-striped' border='0'>"
            . "<tr>"
            . "<td colspan='3' align='center' class='border'><b>Dirección Anterior del Beneficiario</b></td>"
            . "</tr>"
            . "<tr>
                <td class='   border-right'>
                    <span class='subtitulo'>Estado:</span> " . date('d/m/Y', strtotime($persona->FECHANACIMIENTO)) . "<br>
                </td>
                <td class=' border-right'>
                    <span class='subtitulo'>Municipio:</span> " . $persona->SEXO . "<br>
                </td>
                <td>
                    <span class='subtitulo'>Parroquia:</span> " . $persona->EDOCIVIL . "<br>
                </td>
            </tr>"
            . "</table>"
            . "</div>";

    $html.="<br/>"
            . "<div id='prueba'>"
            . "<table class='table table-striped' border='0'>"
            
            . "<tr>"
            . "<td colspan='3' align='center' class='border'><b>Datos Laborales del Beneficiario</b></td>"
            . "</tr>"
            
            . "<tr>
                <td class='col-interno' colspan='3'  >
                    <span class='subtitulo'>Condición de Trabajo:</span> " . "<br>
                </td>
                
                </tr>"
            
            . "<tr>
                <td class='col-interno' colspan='3'>
                       <label>Desempleado<input type='checkbox'></label>&nbsp;&nbsp;<label>Trabajando<input type='checkbox'>&nbsp;&nbsp;Hogar</label><label><input type='checkbox'></label>&nbsp;&nbsp;<label>Incapacitad<input type='checkbox'></label>&nbsp;&nbsp;<label>Pensionado<input type='checkbox'></label></font>          
" . "<br>
                </td>
                
                </tr>"
            
            
            . "<tr>
                <td>
                <table >
                  <tr> 
                <td class='uno'>
                    <span class='uno'><b>Fuente Principal de Ingresos:</b></span> " . "<br>
                </td>
              
                 <td colspan='2' style=' width: 50%;' class='border-right'>
                    <span class='dos'></span> " . "<br>
                </td>
                <td class='uno'>
                    <span class='uno'><b>Relación de Trabajo:</b></span> " . "<br>
                </td>
                <td class='dos'>
                    <span class='dos'></span> " . "<br>
                </td>
                </tr>
                  <tr> 
                <td class='col-interno' >
                    <label>Ninguna<input type='checkbox'></label>&nbsp;<label>Renta<input type='checkbox'>Pensión</label><label><input type='checkbox'></label><label>Sueldo<input type='checkbox'></label><label>Herencia<input type='checkbox'></label></font>          
" . "<br>
                </td>
              
                 <td colspan='2' style=' width: 50%;' class='border-right'>
                    <span class='dos'></span> " . "<br>
                </td>
                <td class='col-interno' >
                    <label>Empleador<input type='checkbox'></label>&nbsp;&nbsp;<label>Cuenta Propia<input type='checkbox'>&nbsp;Patrón</label><label><input type='checkbox'></label><label>Empresa Privada<input type='checkbox'></label><label>Empresa Pública<input type='checkbox'></label>&nbsp;&nbsp;<label>Miembro Cooperal<input type='checkbox'></label></font>          
" . "<br>
                </td>
                <td class='dos'>
                    <span class='dos'></span> " . "<br>
                </td>
                </tr>
                
                <tr> 
                <td class='col-interno'>
                    <span class='uno'><b>Nombre de la Empresa Donde Trabaja:</b></span> " . "<br>
                </td>
              
                 <td colspan='2' style=' width: 50%;' class='border-right'>
                    <span class='dos'></span> " . "<br>
                </td>
                <td class='col-interno'>
                    <span class='uno'><b>Dirección de la Empresa:</b></span> " . "<br>
                </td>
                <td class='dos'>
                    <span class='dos'></span> " . "<br>
                </td>
                </tr>
                

                <tr> 
                <td class='col-interno'>
                    <span class='uno'>|</span> " . "<br>
                </td>
              
                 <td colspan='2' style=' width: 50%;' class='border-right'>
                    <span class='dos'></span> " . "<br>
                </td>
                <td class='col-interno'>
                    <span class='uno'>|</span> " . "<br>
                </td>
                <td class='dos'>
                    <span class='dos'></span> " . "<br>
                </td>
                </tr>
                
                
                
                </table>
                  
                </td>
                
            </tr>"
            
            
            
            
            
            
            . "</table>"
            . "</div>";
    
    $html.="<br/>"
            . "<div id='prueba'>"
            . "<table class='table table-striped' border='0'>"
           
            . "<tr>
                <td class='   border-right' >
                    <span class='subtitulo'>Teléfono Empresa:</span> " . "<br>
                </td>
                <td class=' border-right' colspan='2'>
                    <span class='subtitulo'>Cargo:</span> " .  "<br>
                </td>
                <td class=' border-right'>
                    <span class='subtitulo'>Ingreso Mensual Bs:</span> " .  "<br>
                </td>
                
            </tr>"
            . "</table>"
            . "</div>";
    $html.="<br/>"
            . "<div id='prueba'>"
            . "<table class='table table-striped' border='0'>"
            
            . "<tr>"
            . "<td colspan='3' align='center' class='border'><b>Datos Laborales del Conyuge</b></td>"
            . "</tr>"
            
            . "<tr>
                <td class='col-interno' colspan='3'  >
                    <span class='subtitulo'>Condición de Trabajo:</span> " . "<br>
                </td>
                
                </tr>"
            
            . "<tr>
                <td class='col-interno' colspan='3'>
                       <label>Desempleado<input type='checkbox'></label>&nbsp;&nbsp;<label>Trabajando<input type='checkbox'>&nbsp;&nbsp;Hogar</label><label><input type='checkbox'></label>&nbsp;&nbsp;<label>Incapacitad<input type='checkbox'></label>&nbsp;&nbsp;<label>Pensionado<input type='checkbox'></label></font>          
" . "<br>
                </td>
                
                </tr>"
            
            
            . "<tr>
                <td>
                <table >
                  <tr> 
                <td class='uno'>
                    <span class='uno'><b>Fuente Principal de Ingresos:</b></span> " . "<br>
                </td>
              
                 <td colspan='2' style=' width: 50%;' class='border-right'>
                    <span class='dos'></span> " . "<br>
                </td>
                <td class='uno'>
                    <span class='uno'><b>Relación de Trabajo:</b></span> " . "<br>
                </td>
                <td class='dos'>
                    <span class='dos'></span> " . "<br>
                </td>
                </tr>
                  <tr> 
                <td class='col-interno' >
                    <label>Ninguna<input type='checkbox'></label>&nbsp;<label>Renta<input type='checkbox'>&nbsp;Pensión</label><label><input type='checkbox'></label>&nbsp;<label>Sueldo<input type='checkbox'></label><label>Herencia<input type='checkbox'></label></font>          
" . "<br>
                </td>
              
                 <td colspan='2' style=' width: 50%;' class='border-right'>
                    <span class='dos'></span> " . "<br>
                </td>
                <td class='col-interno' >
                    <label>Empleador<input type='checkbox'></label>&nbsp;&nbsp;<label>Cuenta Propia<input type='checkbox'>&nbsp;&nbsp;Patrón</label><label><input type='checkbox'></label>&nbsp;<label>Empresa Privada<input type='checkbox'></label><label>Empresa Pública<input type='checkbox'></label>&nbsp;&nbsp;<label>Miembro Cooperal<input type='checkbox'></label></font>          
" . "<br>
                </td>
                <td class='dos'>
                    <span class='dos'></span> " . "<br>
                </td>
                </tr>
                
                <tr> 
                <td class='col-interno'>
                    <span class='uno'><b>Nombre de la Empresa Donde Trabaja:</b></span> " . "<br>
                </td>
              
                 <td colspan='2' style=' width: 50%;' class='border-right'>
                    <span class='dos'></span> " . "<br>
                </td>
                <td class='col-interno'>
                    <span class='uno'><b>Dirección de la Empresa:</b></span> " . "<br>
                </td>
                <td class='dos'>
                    <span class='dos'></span> " . "<br>
                </td>
                </tr>
                

                <tr> 
                <td class='col-interno'>
                    <span class='uno'>|</span> " . "<br>
                </td>
              
                 <td colspan='2' style=' width: 50%;' class='border-right'>
                    <span class='dos'></span> " . "<br>
                </td>
                <td class='col-interno'>
                    <span class='uno'>|</span> " . "<br>
                </td>
                <td class='dos'>
                    <span class='dos'></span> " . "<br>
                </td>
                </tr>
                
                
                
                </table>
                  
                </td>
                
            </tr>"
            
            
            
            
            
            
            . "</table>"
            . "</div>";
    
    $html.="<br/>"
            . "<div id='prueba'>"
            . "<table class='table table-striped' border='0'>"
           
            . "<tr>
                <td class='   border-right'>
                    <span class='subtitulo'>Teléfono Empresa:</span> " . "<br>
                </td>
                <td class=' border-right'>
                    <span class='subtitulo'>Cargo:</span> " .  "<br>
                </td>
                <td>
                    <span class='subtitulo'>Ingreso Mensual Personal Bs.:</span> " .  "<br>
                </td>
            </tr>"
            
            
            
            . "</table>"
            . "</div>";
    
             $html.="<br/>"
            . "<div id='prueba'>"
            . "<table class='table table-striped' border='0'>"
            . "<tr>"
            . "<td colspan='3' align='center' class='border'><b>Ingreso Familiar</b></td>"
            . "</tr>"
            . "<tr>
               <td class= colspan='3'  >
                    <span class='subtitulo'>Ingreso Total Familiar:</span> " . "<br>
                </td>
               
            </tr>"
            . "</table>"
            . "</div>";
             
            




    $html.="<p class='saltodepagina'/>";
}

//echo $html; die;

$mpdf = new mPDF('c', 'LETTER');
//$mpdf->SetTitle(' Beneficiario N° '.$model->id_beneficiario_temporal.' '.date('h:i:A') .'');
$mpdf->SetMargins(5, 50, 30);
$mpdf->SetAuthor('BANAVIH - Banco Nacional de Vivienda y Habitat');
$mpdf->SetCreator('BANAVIH - Banco Nacional de Vivienda y Habitat');
$mpdf->SetHTMLHeader($cabecera);
$mpdf->WriteHTML($html);
$mpdf->SetFooter('Generado desde el Sistema de Protocolización el ' . date('d-m-Y') . ' a las ' . date('h:i:A') . '' . Yii::app()->user->name . ' |                        Página {PAGENO}/{nbpg}');
$mpdf->Output('Beneficiario.pdf', 'D');
exit;
?>

<style>

    .uno {
        float: left;
        width: 50%;
    }
    .dos {
        float: right;
        width: 50%;
    }
</style>
