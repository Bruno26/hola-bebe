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
<h2><strong><FONT COLOR='#000080'>Reporte del Abogado: ".nombre('PRIMER_NOMBRE',$model->persona_id)." ".apellido('PRIMER_APELLIDO',$model->persona_id)." /" . date('d-m-Y') . "</FONT></strong></h2><br/>
</div>
";

$html.="
        <style type='text/css'>
		table{
			width:80%;
		}
		table tr th{
			text-align: left;
			font-size: 18px;
			padding-bottom: 15px;
			padding-top: 15px;
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
	<center>
		<table>
			<tr>
				<th colspan='2'>Datos Personales</th>
			</tr>
			<tr>
				<td>
					<span class='subtitulo'>Nombre:</span> ".nombre('PRIMER_NOMBRE',$model->persona_id)."
					<br>
					<span class='subtitulo'>Apellido:</span> ".apellido('PRIMER_APELLIDO',$model->persona_id)."
                                        <br>
                                        <span class='subtitulo'>Cédula de Identidad:</span> ".nacionalidadCedula('NACIONALIDAD','CEDULA', $model->persona_id)."
					<br>
					<br>
					<br>
					<span class='subtitulo'>Inpreabogado:</span> $model->inpreabogado
					<br>
					<span class='subtitulo'>Tipo de Abogado:</span> ".$model->tipoAbogado->descripcion."
				</td>
			</tr>
			<tr>
				<th colspan='2'>Oficina Asignada</th>
			</tr>
			<tr>
				<td colspan='2'><span class='subtitulo'>Oficina:</span> ".$model->oficinaId->nombre." </td>
				<td colspan='2'><span class='subtitulo'>Observaciones:</span> $model->observaciones</td>
			</tr>
		</table>
	</center>
        ";

$mpdf = new mPDF('c', 'LETTER');
$mpdf->SetTitle(' Abogado N° '.$model->id.' '.date('h:i:A') .'');
$mpdf->SetMargins(5, 50, 30);
$mpdf->SetAuthor('BANAVIH - Banco Nacional de Vivienda y Habitat');
$mpdf->SetCreator('BANAVIH - Banco Nacional de Vivienda y Habitat');
$mpdf->SetHTMLHeader($cabecera);
$mpdf->WriteHTML($html);
$mpdf->Output('Abogado-'.$model->id.' .pdf','D');
exit;
?>
