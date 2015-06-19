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

?>
<?php

$pdf = Yii::createComponent('application.vendors.mpdf.mpdf');
$cabecera = '<img src="' . Yii::app()->request->baseUrl . '/images/cintillo.jpg"/>';


$html.="<table align='right' width='100%' border='0'>       
    <tr>
                <td colspan='2' align='center'><b><font size='6' color='#B40404'>Oficina: </br></br></font><font size='6'> ".$model->nombre ."/". date('d-m-Y') ." </font>
        <br/>
                <br/>
                </td>
            </tr>
            <tr><td colspan='2'></td></tr><tr><td colspan='2'></td></tr>
            <tr><td colspan='2'></td></tr><tr><td colspan='2'></td></tr>
            <tr><td colspan='2'></td></tr><tr><td colspan='2'></td></tr>
            <tr><td colspan='2'></td></tr><tr><td colspan='2'></td></tr>
            <tr>
            </tr>
            <tr>
                <td colspan='2' align='center'>
                    <b>Oficina</b>
                </td>
            </tr>
            <tr>
		<td><span class='subtitulo'>Nombre de la Oficina:</span> $model->nombre<br><span class='subtitulo'>Jefe Asignado:</span> ".nombre('PRIMER_NOMBRE', $model->persona_id_jefe)." ".apellido('PRIMER_APELLIDO', $model->persona_id_jefe).
                "<br>"."<span class='subtitulo'>Observaciones:</span> $model->observaciones</td>
                <td colspan='1' align='right'><img src='" . Yii::app()->baseUrl . "/images/banavih_ndice1.png' style='width: 25%;'/></td>
            </tr>
            <tr>
                <td colspan='2' align='center'>
                    <b>Ubicación</b>
                </td>
            </tr>
            <tr>
		<td colspan='2'><span class='subtitulo'>Estado:</span> ".$model->parroquia->clvmunicipio0->clvestado0->strdescripcion."<br><span class='subtitulo'>Municipio:</span> ".$model->parroquia->clvmunicipio0->strdescripcion."<br><span class='subtitulo'>Parroquia:</span> ".$model->parroquia->strdescripcion."</td>
            </tr>



        


</table>
";

$mpdf = new mPDF('c', 'LETTER');
$mpdf->SetTitle(' Desarrollo Habitacional N° '.$model->id_oficina.' - '.$model->nombre.' '.date('h:i:A') .'');
$mpdf->SetMargins(5, 50, 30);
$mpdf->SetAuthor('BANAVIH - Banco Nacional de Vivienda y Habitat');
$mpdf->SetCreator('BANAVIH - Banco Nacional de Vivienda y Habitat');
$mpdf->SetHTMLHeader($cabecera);
$mpdf->SetFooter('Generado desde el Sistema de Protocolización el ' . date('d-m-Y') . ' a las ' . date('h:i:A') . '' . Yii::app()->user->name . ' |                        Página {PAGENO}/{nbpg}');
$mpdf->WriteHTML($html);
$mpdf->Output('Oficina-'.$model->id_oficina. ' .pdf','D');
exit;
?>
