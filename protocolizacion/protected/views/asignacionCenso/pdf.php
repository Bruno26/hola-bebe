<?php

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

?>
<?php

$pdf = Yii::createComponent('application.vendors.mpdf.mpdf');
$cabecera = '<img src="' . Yii::app()->request->baseUrl . '/images/cintillo.jpg"/>';




$html.="<table align='right' width='100%' border='0'>       
                            <tr>
                                        <td colspan='3' align='center'><b><font size='6' color='#B40404'>Reporte de Asignación de Censo:</font><font size='6'> ".nombre('PRIMER_NOMBRE',$model->persona_id)." ".apellido('PRIMER_APELLIDO',$model->persona_id)." /" . date('d-m-Y') ." </font></td>
                                <br/>
                                <br/>
                            </tr>
                                        <tr><td colspan='3'></td></tr><tr><td colspan='3'></td></tr>
                                        <tr><td colspan='3'></td></tr><tr><td colspan='3'></td></tr>
                                        <tr><td colspan='3'></td></tr><tr><td colspan='3'></td></tr>
                                        <tr><td colspan='3'></td></tr><tr><td colspan='3'></td></tr>
            
                             <tr>
                                        <td colspan='3' align='center'><b>Lugar a Censar</b></td>
                             </tr>
			<tr>
				<td>
					<span class='subtitulo'><b>Estado:</b></span> " . $model->desarrollo->fkParroquia->clvmunicipio0->clvestado0->strdescripcion . "
					<br>
					<span class='subtitulo'><b>Municipio:</b></span> " . $model->desarrollo->fkParroquia->clvmunicipio0->strdescripcion . "
					<br>
					<span class='subtitulo'><b>Parroquia:</b></span> " . $model->desarrollo->fkParroquia->strdescripcion . "
					<br>
					<span class='subtitulo'><b>Nombre del Desarrollo Habitacional:</b></span> " . $model->desarrollo->nombre . "
					<br>
					<span class='subtitulo'><b>Nombre de la Oficina:</b></span> " . $model->oficina->nombre . "
					<br>
					<span class='subtitulo'><b>Censado:</b></span> " . (($model->censado) ? 'SI' : 'NO') . "
					<br>
					<span class='subtitulo'><b>Fecha de Asignación:</b></span> " . Yii::app()->dateFormatter->format("d/M/y - hh:mm a", strtotime($data->fecha_asignacion)) . "
				</td>
                                 <td colspan='2' align='right'><img src='" . Yii::app()->baseUrl . "/images/banavih_ndice1.png' style='width: 25%;'/></td>
				</tr>
                                <br/>
                                <br/>
			<tr>
                                 <td colspan='3' align='center'><b>Persona Asignada</b></td>
			</tr>
                        <br/>
                                <br/>
			<tr>
				<td>
					<span class='subtitulo'><b>Nombre:</b></span> " . nombre('PRIMER_NOMBRE', $model->persona_id) . "
					<br>
					<span class='subtitulo'><b>Apellido:</b></span> " . apellido('PRIMER_APELLIDO', $model->persona_id) . "
					<br>
					<span class='subtitulo'><b>Cedula de Identidad:</b></span> " . nacionalidadCedula('NACIONALIDAD', 'CEDULA', $model->persona_id) . "
				</td>
				
				
			</tr>
		</table>
	</center>
";

$mpdf = new mPDF('c', 'LETTER');
$mpdf->SetTitle(' Asignación de Censo N° ' . $model->id_asignacion_censo . ' ' . date('h:i:A') . '');
$mpdf->SetMargins(5, 50, 30);
$mpdf->SetAuthor('BANAVIH - Banco Nacional de Vivienda y Habitat');
$mpdf->SetCreator('BANAVIH - Banco Nacional de Vivienda y Habitat');
$mpdf->SetHTMLHeader($cabecera);
$mpdf->WriteHTML($html);
$mpdf->Output('Asignacion_Censo-' . $model->id_asignacion_censo . ' .pdf', 'D');
exit;
?>
