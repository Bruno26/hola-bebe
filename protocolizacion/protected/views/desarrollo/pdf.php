<?php
$titularidad_del_terreno = ($model->titularidad_del_terreno == TRUE)? "SI":"NO";
?>
<?php

$pdf = Yii::createComponent('application.vendors.mpdf.mpdf');
$cabecera = '<img src="' . Yii::app()->request->baseUrl . '/images/cintillo_200_admirable.jpg"/>';


$html.=

        "<div style='text-align:center; width:100%; margin-left:0%;margin-top:4%'>
            <br>
<h2><strong><FONT COLOR='#000080'>Reporte del Desarrollo Habitacional $model->nombre /" . date('d-m-Y') . "</FONT></strong></h2><br/>
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
				<th colspan='2'> Desarrollo Habitacional</th>
			</tr>
			<tr>
				<td colspan='2'>
					<span class='subtitulo'>Nombre del Desarrollo:</span> $model->nombre
					<br>
					<span class='subtitulo'>Descripción del Desarrollo:</span> $model->descripcion
				</td>
				</tr>
			<tr>
				<th colspan='2'> Ubicación del Desarrollo</th>
			</tr>
			<tr>
				<td>
					<span class='subtitulo'>Estado:</span> ".$model->fkParroquia->clvmunicipio0->clvestado0->strdescripcion."
					<br>
					<span class='subtitulo'>Municipio:</span> ".$model->fkParroquia->clvmunicipio0->strdescripcion."
					<br>
					<span class='subtitulo'>Parroquia:</span> ".$model->fkParroquia->strdescripcion."
				</td>
				<td>
					<span class='subtitulo'>Urbanización/Barrio:</span> $model->urban_barrio
					<br>
					<span class='subtitulo'>Avenida/Calle/Esquina/Carretera:</span> $model->av_call_esq_carr
					<br>
					<span class='subtitulo'>Zona:</span> $model->zona
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
				<td>
                                        <span class='subtitulo' style='text-align:left;'>Coordenadas:</span> $model->coordenadas
                                        <br>
                                        <span class='subtitulo' style='text-align:left;'>Lote Terreno Mt2:</span> $model->lote_terreno_mt2
                                </td>
			</tr>
			<tr>
				<th colspan='2'> Programa</th>
			</tr>
			<tr>
				<td>
					<span class='subtitulo'>Programa:</span> ".$model->programa->nombre_programa."
					<br>
					<span class='subtitulo'>Fuente de Finaciamiento:</span> ".$model->fuenteFinanciamiento->nombre_fuente_financiamiento."
					<br>
					<span class='subtitulo'>Ente Ejecutor:</span> ".$model->enteEjecutor->nombre_ente_ejecutor."
				</td>
				<td>
					<span class='subtitulo'>Titularidad del Terreno:</span> $titularidad_del_terreno
				</td>
			</tr>
		</table>
	</center>
";

$mpdf = new mPDF('c', 'LETTER');
$mpdf->SetTitle(' Desarrollo Habitacional N° '.$model->id_desarrollo.' - '.$model->nombre.' '.date('h:i:A') .'');
$mpdf->SetMargins(5, 50, 30);
$mpdf->SetAuthor('BANAVIH - Banco Nacional de Vivienda y Habitat');
$mpdf->SetCreator('BANAVIH - Banco Nacional de Vivienda y Habitat');
$mpdf->SetHTMLHeader($cabecera);
$mpdf->WriteHTML($html);
$mpdf->Output('Desarrollo-Habitacional-'.$model->id_desarrollo. ' .pdf','D');
exit;
?>
