<?php

$pdf = Yii::createComponent('application.vendors.mpdf.mpdf');
$cabecera = '<img src="' . Yii::app()->request->baseUrl . '/images/cintillo.jpg"/>';








$html.="<table align='right' width='100%' border='0'>       
                        <tr>
                                    <td colspan='4' align='center'><b><font size='6' color='#B40404'>Reporte De La Unidad Multifamiliar: </br></br></font><font size='6'> ".$model->nombre ."/". date('d-m-Y') ." </font>
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
				<b><td colspan='4' align='center'>Ubicación del Desarrollo Habitacional</td></b>
			</tr>
	
			<tr>
				<td>
					<span>Estado:</span> ".$model->desarrollo->fkParroquia->clvmunicipio0->clvestado0->strdescripcion ."
					<br>
					<span>Municipio:</span>". $model->desarrollo->fkParroquia->clvmunicipio0->strdescripcion ."
					<br>
                                        <span>Parroquia:</span> ".$model->desarrollo->fkParroquia->strdescripcion."
				</td>
                                <td colspan='1' align='right'>
                                        <img src='" . Yii::app()->baseUrl . "/images/LOGO_BANAVIH-1.jpg' style='width: 25%;'/>
                                 </td>
                                 
			</tr>
                        <br/>
                       <br/>
			<tr>
                        <b><td colspan='4' align='center'>Unidad Multifamiliar</td></b>
			</tr>
                        <br/>
                       <br/>
			<tr>
				<td>
					<span>Nombre del Desarollo:</span> ".$model->desarrollo->nombre ."
					<br>
					<span>Nombre de Unidad Multifamiliar:</span> $model->nombre
					<br>
                                        <span>Tipo de Inmueble:</span> ".$model->genTipoInmueble->descripcion."
				</td>
			</tr>
                        <br/>
                       <br/>
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
$mpdf->SetFooter('Generado desde el Sistema de Protocolización el ' . date('d-m-Y') . ' a las ' . date('h:i:A') . '' . Yii::app()->user->name . ' |                        Página {PAGENO}/{nbpg}');
$mpdf->WriteHTML($html);
$mpdf->Output('Unidad-Habitacional-'.$model->nombre. ' .pdf','D');
exit;
?>

