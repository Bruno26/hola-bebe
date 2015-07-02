<?php
	function nombre($selec,$iD){
	    $saime = ConsultaOracle::getPersonaByPk($selec,(int)$iD);
	    return $saime['PRIMER_NOMBRE'];
	}
	function apellido($selec,$iD){
	    $saime = ConsultaOracle::getPersonaByPk($selec,(int)$iD);
	    return $saime['PRIMER_APELLIDO'];
	}
        function nacionalidadCedula($selec,$select2,$iD){
	    $saime = ConsultaOracle::getNacionalidadCedulaPersonaByPk($selec,$select2,(int)$iD);
	    return $saime['NACIONALIDAD']." - ".$saime['CEDULA'];
	}

    $persona = (object) ConsultaOracle::getPersonaBeneficiario($model->nacionalidad, $model->cedula);
?>

<?php

$pdf = Yii::createComponent('application.vendors.mpdf.mpdf');
$cabecera = '<img src="' . Yii::app()->request->baseUrl . '/images/cintillo.jpg"/>';


$html.="<table align='right' width='100%' border='0'>       
    <tr >
                <td colspan='3' align='center'><b><font size='6' color='#B40404'>Beneficiario:</font><font size='6'> ".nombre('PRIMER_NOMBRE',$model->persona_id)." ".apellido('PRIMER_APELLIDO',$model->persona_id)." /" . date('d-m-Y') ." </font></td>
        <br/>
                <br/>
                </td>
            </tr>
            <tr><td colspan='3'></td></tr><tr><td colspan='3'></td></tr>
            <tr><td colspan='3'></td></tr><tr><td colspan='3'></td></tr>
            <tr><td colspan='3'></td></tr><tr><td colspan='3'></td></tr>
            <tr><td colspan='3'></td></tr><tr><td colspan='3'></td></tr>
            <tr>
            </tr>
             <tr>
                    <td colspan='3' align='center'><b>Datos Personales</b></td>
            </tr>
            <tr>
                    <td>
                            <span class='subtitulo'>Nombre:</span> ".nombre('PRIMER_NOMBRE',$model->persona_id)."<br>
                            <span class='subtitulo'>Apellido:</span> ".apellido('PRIMER_APELLIDO',$model->persona_id)."<br>
                            <span class='subtitulo'>Cédula de Identidad:</span> ".nacionalidadCedula('NACIONALIDAD','CEDULA', $model->persona_id)."<br>
                            <span class='subtitulo'>Teléfono Habitación:</span> ".$persona->TELEFONOHAB."<br>
                            <span class='subtitulo'>Teléfono Celular:</span> ".$persona->TELEFONOMOVIL."<br>
                            <span class='subtitulo'>Correo Electrónico:</span> ".$persona->CORREO."<br>
                    </td>
                    <td colspan='2' align='right'><img src='" . Yii::app()->baseUrl . "/images/LOGO_BANAVIH-1.jpg' style='width: 25%;'/></td>
            </tr>
             <tr>
                    <td colspan='3' align='center'><b>Desarrollo</b></td>
            </tr>
             <br/>
             <br/>
            <tr>
                    <td>
                            <span class='subtitulo'>Desarrollo:</span> ".$model->desarrollo->nombre."<br>
                            <span class='subtitulo'>Estado:</span> ".$model->desarrollo->fkParroquia->clvmunicipio0->clvestado0->strdescripcion."<br>
                            <span class='subtitulo'>Municipio:</span> ".$model->desarrollo->fkParroquia->clvmunicipio0->strdescripcion."<br>
                            <span class='subtitulo'>Parroquia:</span> ".$model->desarrollo->fkParroquia->strdescripcion."<br>
                            <span class='subtitulo'>Unidad Multifamiliar:</span> ".$model->unidadHabitacional->nombre."<br>
                            <span class='subtitulo'>Tipo de Inmueble:</span> ".$model->unidadHabitacional->genTipoInmueble->descripcion."<br>
                            <span class='subtitulo'>Piso:</span> ".$model->vivienda->nro_piso."<br>
                            <span class='subtitulo'>Número de Vivienda:</span> ".$model->vivienda->nro_vivienda."<br>
                            <span class='subtitulo'>Fecha de Creación:</span> ".date('d/m/Y', strtotime($model->fecha_creacion))."<br>
                            
                                
                    </td>
            </tr>
            
            
            </table>

";


$mpdf = new mPDF('c', 'LETTER');
$mpdf->SetTitle(' Beneficiario N° '.$model->id_beneficiario_temporal.' '.date('h:i:A') .'');
$mpdf->SetMargins(5, 50, 30);
$mpdf->SetAuthor('BANAVIH - Banco Nacional de Vivienda y Habitat');
$mpdf->SetCreator('BANAVIH - Banco Nacional de Vivienda y Habitat');
$mpdf->SetHTMLHeader($cabecera);

$mpdf->WriteHTML($html);
$mpdf->SetFooter('Generado desde el Sistema de Protocolización el ' . date('d-m-Y') . ' a las ' . date('h:i:A') . '' . Yii::app()->user->name . ' |                        Página {PAGENO}/{nbpg}');
$mpdf->Output('Beneficiario-'.$model->id_beneficiario_temporal.' .pdf','D');
exit;
?>
