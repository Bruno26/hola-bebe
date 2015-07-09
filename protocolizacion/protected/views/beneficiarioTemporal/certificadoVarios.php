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
        </style>';
foreach ($recordBeneTemp as $model) {
    $cabecera = '<img src="' . Yii::app()->request->baseUrl . '/images/cintillo.jpg"/>';
    $persona = (object) ConsultaOracle::getPersonaBeneficiario($model->nacionalidad, $model->cedula);
    $html.="<div>"
            . "<table>"
            . "<tr>"
            . "<td align='left'><b><font size='6' color='#B40404'>"
            . "Adjudicado:</font><font size='5'> " . nombre('PRIMER_NOMBRE', $model->persona_id) . " " . apellido('PRIMER_APELLIDO', $model->persona_id) . " <br/>Fecha de Adjudicación: " . date('d/m/Y', strtotime($model->fecha_creacion)) . "<br/>Fecha de Censo: _______________________ </font>"
            . "</td>"
            . "<td align='right'><img src='" . Yii::app()->baseUrl . "/images/LOGO_BANAVIH-1.jpg' style='width: 25%;'/></td>"
            . "</tr>"
            . "</table>"
            . "</div>"
            . "<br/>"
            . "<div style='margin-top:1%'></div>";
    $html.="<br/>"
            . "<div id='prueba'>"
            . "<table class='table table-striped' border='0'>"
            . "<tr>"
            . "<td colspan='3' align='center' class='border'><b>Datos Personales</b></td>"
            . "</tr>"
            . "<tr>
                <td class='col-interno border-right' colspan='2'>
                    <span class='subtitulo'>Nombre Completo:</span> " . $model->nombre_completo . "<br>
                </td>
                <td class='col-interno'>
                    <span class='subtitulo'>Cédula:</span> " .nacionalidadCedula('NACIONALIDAD', 'CEDULA', $model->persona_id). "<br>

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
    $html.="<br/>"
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
                <td class='col-interno border-right'>
                    <span class='subtitulo'>Urbanización/Barrio:</span> " . $model->desarrollo->urban_barrio . "<br>
                </td>
                <td class='col-interno border-right'>
                    <span class='subtitulo'>Avenida/Calle/Esquina/Carretera:</span> " . $model->desarrollo->av_call_esq_carr . "<br>
                </td>
                <td class='col-interno'>
                    <span class='subtitulo'>Zona:</span> " . $model->desarrollo->zona . "<br>
                </td>
            </tr>"
            . "<tr>
                <td class='col-interno border-right'>
                    <span class='subtitulo'>Lote Terreno Mt2:</span> " . $model->desarrollo->lote_terreno_mt2 . "<br>
                </td>
                <td class='col-interno border-right'>
                    <span class='subtitulo'>Piso:</span> " . $model->vivienda->nro_piso . "<br>
                </td>
                <td class='col-interno'>
                    <span class='subtitulo'>N° de la Vivienda:</span> " . $model->vivienda->nro_vivienda . "<br>
                </td>
            </tr>"
            . "<tr>
                <td colspan='2' style=' width: 50%;' class='border-right'>
                    <span class='subtitulo'>Tipo de Inmueble:</span> " . $model->unidadHabitacional->genTipoInmueble->descripcion . "<br>
                </td>
                <td style=' width: 50%;'>
                    <span class='subtitulo'>Área de Vivienda mt2:</span><br>
                </td>
            </tr>"
            . "</table>"
            . "</div>";

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
                    <span class='subtitulo'>Lote Terreno Mt2:</span> " . $model->desarrollo->lote_terreno_mt2 . "<br>
                </td>
                <td class='col-interno border-right'>
                    <span class='subtitulo'>Piso:</span> " . $model->vivienda->nro_piso . "<br>
                </td>
                <td class='col-interno'>
                    <span class='subtitulo'>N° de la Vivienda:</span> " . $model->vivienda->nro_vivienda . "<br>
                </td>
            </tr>"
            . "<tr>
                <td colspan='2' style=' width: 50%;' class='border-right'>
                    <span class='subtitulo'>Tipo de Inmueble:</span> " . $model->unidadHabitacional->genTipoInmueble->descripcion . "<br>
                </td>
                <td style=' width: 50%;'>
                    <span class='subtitulo'>Área de Vivienda mt2:</span><br>
                </td>
            </tr>"
            . "</table>"
            . "</div>";
    $html.="<p class='saltodepagina'/>";
}



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
