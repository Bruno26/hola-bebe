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
            <br>
<h2><strong><FONT COLOR='#000080'>Reporte de Asignación de Censo a la Unidad Habitacional: ".$model->unidadHabitacional->nombre." /" . date('d-m-Y') . "</FONT></strong></h2><br/>
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
				<th colspan='2'> Lugar a Censar</th>
			</tr>
			<tr>
				<td>
					<span class='subtitulo'>Unidad Habitacional:</span> ".$model->unidadHabitacional->nombre."
					<br>
					<span class='subtitulo'>Nombre de la Oficina:</span> ".$model->oficina->nombre."
					<br>
					<span class='subtitulo'>Censado:</span> ".(($model->censado)?'SI':'NO')."
				</td>
				</tr>
			<tr>
				<th colspan='2'> Persona Asignada</th>
			</tr>
			<tr>
				<td>
					<span class='subtitulo'>Nombre:</span> ".nombre('PRIMER_NOMBRE', $model->persona_id)."
					<br>
					<span class='subtitulo'>Apellido:</span> ".apellido('PRIMER_APELLIDO', $model->persona_id)."
					<br>
					<span class='subtitulo'>Cedula de Identidad:</span> ".nacionalidadCedula('NACIONALIDAD','CEDULA', $model->persona_id)."
				</td>
				<td>
					<span class='subtitulo'>Fecha de Asignación:</span> ".Yii::app()->dateFormatter->format("d/M/y - hh:mm a", strtotime($data->fecha_asignacion))."
				</td>
			</tr>
		</table>
	</center>
";

$mpdf = new mPDF('c', 'LETTER');
$mpdf->SetTitle(' Asignación de Censo N° '.$model->id_asignacion_censo.' '.date('h:i:A') .'');
$mpdf->SetMargins(5, 50, 30);
$mpdf->SetAuthor('BANAVIH - Banco Nacional de Vivienda y Habitat');
$mpdf->SetCreator('BANAVIH - Banco Nacional de Vivienda y Habitat');
$mpdf->SetHTMLHeader($cabecera);
$mpdf->WriteHTML($html);
$mpdf->Output('Asignacion_Censo-'.$model->id_asignacion_censo. ' .pdf','D');
exit;
?>
