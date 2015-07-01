<?php
$titularidad_del_terreno = ($model->titularidad_del_terreno == TRUE)? "SI":"NO";
?>
<?php

$pdf = Yii::createComponent('application.vendors.mpdf.mpdf');
$cabecera = '<img src="' . Yii::app()->request->baseUrl . '/images/cintillo.jpg"/>';



$html="<table align='right' width='100%' border='0'>       
                        <tr>
                                    <td colspan='4' align='center'><b><font size='6' color='#B40404'>Desarrollo Habitacional: </br></br></font><font size='6'> ".$model->nombre ."/". date('d-m-Y') ." </font>
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
				<b><td colspan='4' align='center'> Desarrollo Habitacional</td></b>
			</tr>
			<tr>
				<td colspan='3'>
					<span class='subtitulo'>Nombre del Desarrollo:</span> $model->nombre
                                            
					<br>
					<span class='subtitulo'>Descripción del Desarrollo:</span> $model->descripcion
				</td>
                                <td colspan='1' align='right'>
                                        <img src='" . Yii::app()->baseUrl . "/images/LOGO_BANAVIH-1.jpg' style='width: 25%;'/>
                                 </td>
                                
				</tr>
			<tr>
				<b><td colspan='4' align='center'> Ubicación del Desarrollo</td></b>
			</tr>
                        <br>
                        <br>
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
                        <br>
                        <br>
			<tr>
				<b><td colspan='4' align='center'> Linderos</td></b>
			</tr>
                        <br>
                        <br>
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
				<b><td colspan='4' align='center'> Programa</td></b>
			</tr>
                        <br>
                        <br>
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

";

$mpdf = new mPDF('c', 'LETTER');
$mpdf->SetMargins(5, 50, 30);
$mpdf->SetAuthor('BANAVIH - Banco Nacional de Vivienda y Habitat');
$mpdf->SetCreator('BANAVIH - Banco Nacional de Vivienda y Habitat');
$mpdf->SetHTMLHeader($cabecera);
$mpdf->SetFooter('Generado desde el Sistema de Protocolización el ' . date('d-m-Y') . ' a las ' . date('h:i:A') . '' . Yii::app()->user->name . ' |                        Página {PAGENO}/{nbpg}');
$mpdf->SetTitle(' Desarrollo Habitacional N° '.$model->id_desarrollo.' - '.$model->nombre.' '.date('h:i:A') .'');
$mpdf->WriteHTML($html);
$mpdf->Output('Desarrollo-Habitacional-'.$model->id_desarrollo. ' .pdf','D');
exit;
?>
