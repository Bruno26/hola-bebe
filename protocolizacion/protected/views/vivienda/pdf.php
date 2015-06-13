<?php

$pdf = Yii::createComponent('application.vendors.mpdf.mpdf');
$cabecera = '<img src="' . Yii::app()->request->baseUrl . '/images/cintillo_200_admirable.jpg"/>';


$html.=

        "<div style='text-align:center; width:100%; margin-left:0%;margin-top:4%'>
            <br><br><br>
<h2><strong><FONT COLOR='#000080'>SIPP/ Reporte De La Vivienda N° $model->id_vivienda /" . date('d-m-Y') . "</FONT></strong></h2><br/>
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
				<th colspan='2'> Unidad Multifamiliar</th>
			</tr>
			<tr>
				<td>
					<span class='subtitulo'>Id de la Vivienda:</span> $model->id_vivienda
					<br>
					<span class='subtitulo'>Nombre del Desarrollo:</span> ".$model->unidadHabitacional->desarrollo->nombre."
					<br>
					<span class='subtitulo'>Nombre de la Unidad Habitacional:</span> ".$model->unidadHabitacional->nombre."
				</td>
				</tr>
			<tr>
				<th colspan='2'> Ubicación del Desarrollo</th>
			</tr>
			<tr>
				<td>
					<span class='subtitulo'>Estado:</span> ".$model->unidadHabitacional->desarrollo->fkParroquia->clvmunicipio0->clvestado0->strdescripcion."
					<br>
					<span class='subtitulo'>Municipio:</span> ".$model->unidadHabitacional->desarrollo->fkParroquia->clvmunicipio0->strdescripcion."
					<br>
					<span class='subtitulo'>Parroquia:</span> ".$model->unidadHabitacional->desarrollo->fkParroquia->strdescripcion."
				</td>
			</tr>
			<tr>
				<th> Linderos</th>
				<th> Coordenadas</th>
			</tr>
			<tr>
				<td>
					<span class='subtitulo'>Lindero Norte:</span> $model->lindero_norte
					<br>
					<span class='subtitulo'>Lindero Sur:</span> $model->lindero_sur
					<br>
					<span class='subtitulo'>Lindero Este:</span> $model->lindero_este
					<br>
					<span class='subtitulo'>Lindero Oeste:</span> $model->lindero_oeste
				</td>
				<td><span class='subtitulo' style='text-align:left;'>Coordenadas:</span> $model->coordenadas</td>
			</tr>
			<tr>
				<th colspan='2'> Detalles de la Vivienda</th>
			</tr>
			<tr>
				<td>
					<span class='subtitulo'>Unidad Habitacional:</span> $model->unidad_habitacional_id
					<br>
					<span class='subtitulo'>Tipo Vivienda:</span> $model->tipo_vivienda_id
					<br>
					<span class='subtitulo'>Construcción Mt2:</span> $model->construccion_mt2
					<br>
					<span class='subtitulo'>Piso:</span> $model->nro_piso
					<br>
					<span class='subtitulo'>N° de Vivienda:</span> $model->nro_vivienda
					<br>
					<span class='subtitulo'>Sala:</span> $model->sala
					<br>
					<span class='subtitulo'>Comedor:</span> $model->comedor
					<br>
					<span class='subtitulo'>Cocina:</span> $model->cocina
					<br>
					<span class='subtitulo'>Lavandero:</span> $model->lavandero
					<br>
					<span class='subtitulo'>N° de Habitantes:</span> $model->nro_habitaciones
					<br>
					<span class='subtitulo'>N° de Baños:</span> $model->nro_banos
					<br>
					<span class='subtitulo'>Puesto de Estacionamiento:</span> $model->descripcion_estac
					<br>
					<span class='subtitulo'>N° de Estacionamiento:</span> $model->nro_estacionamientos
					<br>
					<span class='subtitulo'>Precio de Vivienda:</span> $model->precio_vivienda
				</td>
			</tr>
		</table>
	</center>

";

$mpdf = new mPDF('c', 'LETTER');
$mpdf->SetTitle(' Vivienad N° '.$model->id_vivienda.' '.date('h:i:A') .'');
$mpdf->SetMargins(5, 50, 30);
$mpdf->SetAuthor('BANAVIH - Banco Nacional de Vivienda y Habitat');
$mpdf->SetCreator('BANAVIH - Banco Nacional de Vivienda y Habitat');
$mpdf->SetHTMLHeader($cabecera);
$mpdf->WriteHTML($html);
$mpdf->Output('Vivienda-'.$model->id_vivienda. ' .pdf','D');
exit;
?>
