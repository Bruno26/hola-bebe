<?php

$pdf = Yii::createComponent('application.vendors.mpdf.mpdf');
$cabecera = '<img src="' . Yii::app()->request->baseUrl . '/images/cintillo.jpg"/>';


$html.=

        "<div style='text-align:center; width:100%; margin-left:0%;margin-top:4%'>
            <br><br><br>
<h2><strong><FONT COLOR='#000080'>Reporte De La Unidad Multifamiliar:<br> $model->nombre /" . date('d-m-Y') . "</FONT></strong></h2><br/>
</div>


";



$html.="
<style type='text/css'>
		table{
			width:95%;
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
				<th colspan='2'> Ubicación del Desarrollo Habitacional</th>
			</tr>
			<tr>
				<td>
					<span>Estado:</span> ".$model->desarrollo->fkParroquia->clvmunicipio0->clvestado0->strdescripcion ."
					<br>
					<span>Municipio:</span>". $model->desarrollo->fkParroquia->clvmunicipio0->strdescripcion ."
					<br>
                                        <span>Parroquia:</span> ".$model->desarrollo->fkParroquia->strdescripcion."
				</td>
			</tr>
			<tr>
				<th colspan='2' > Unidad Multifamiliar</th>
			</tr>
			<tr>
				<td>
					<span>Nombre del Desarollo:</span> ".$model->desarrollo->nombre ."
					<br>
					<span>Nombre de Unidad Multifamiliar:</span> $model->nombre
					<br>
                                        <span>Tipo de Inmueble:</span> ".$model->genTipoInmueble->descripcion."
				</td>
			</tr>
                        
			<tr>
				<th colspan='2'> Linderos</th>
			</tr>
			<tr>
				<td>
					<span>Lindero Norte:</span> ".$model->lindero_norte ."
					<br>
					<span>Lindero Sur:</span>". $model->lindero_sur ."
					<br>
                                        <span>Lindero Este:</span> ".$model->lindero_este."
					<br>
                                        <span>Lindero Oeste:</span> ".$model->lindero_oeste."
				</td>
			</tr>
		</table>
	</center>

";

$mpdf = new mPDF('c', 'LETTER');
$mpdf->SetTitle(' Unidad Habitacional N° '.$model->id_unidad_habitacional.' - '.$model->nombre.' '.date('h:i:A') .'');
$mpdf->SetMargins(5, 50, 30);
$mpdf->SetAuthor('BANAVIH - Banco Nacional de Vivienda y Habitat');
$mpdf->SetCreator('BANAVIH - Banco Nacional de Vivienda y Habitat');
$mpdf->SetHTMLHeader($cabecera);
$mpdf->WriteHTML($html);
$mpdf->Output('Unidad-Habitacional-'.$model->nombre. ' .pdf','D');
exit;
?>

