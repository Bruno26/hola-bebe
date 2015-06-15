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
$cabecera = '<img src="' . Yii::app()->request->baseUrl . '/images/cintillo_200_admirable.jpg"/>';

$html.=

        "<div style='text-align:center; width:100%; margin-left:0%;margin-top:4%'>
            <br><br><br>
<h2><strong><FONT COLOR='#000080'>Oficina: $model->nombre /" . date('d-m-Y') . "</FONT></strong></h2><br/>
</div>


";

$html.="
        <style type='text/css'>
            table{
		width:90%;
            }
            table tr th{
		text-align: left;
		font-size: 18px;
		padding-bottom: 10px;
		padding-top: 10px;
            }
            table tr td{
		padding-left: 20px;
		width: 50%;
            }
            .subtitulo{
		font-weight: bold;
		font-size: 16px;
		font-style: italic;
            }
            .td2{
		text-align: left;
            }
	</style>
        <table>
            <tr>
		<th colspan='2'>Oficina</th>
            </tr>
            <tr>
		<td><span class='subtitulo'>Nombre de la Oficina:</span> $model->nombre<br><span class='subtitulo'>Jefe Asignado:</span> ".nombre('PRIMER_NOMBRE', $model->persona_id_jefe)." ".apellido('PRIMER_APELLIDO', $model->persona_id_jefe)." </td>
		<td><span class='subtitulo td2'>Observaciones:</span> asdasda</td>
            </tr>
            <tr>
		<th colspan='2'>Ubicación</th>
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
$mpdf->WriteHTML($html);
$mpdf->Output('Desarrollo-Habitacional-'.$model->id_oficina. ' .pdf','D');
exit;
?>
