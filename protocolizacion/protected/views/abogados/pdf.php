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
    <tr >
                <td colspan='3' align='center'><b><font size='6' color='#B40404'>Abogado:</font><font size='6'> ".nombre('PRIMER_NOMBRE',$model->persona_id)." ".apellido('PRIMER_APELLIDO',$model->persona_id)." /" . date('d-m-Y') ." </font></td>
        <br/>
                <br/>
                </td>
            </tr>
            <tr><td colspan='3'></td></tr><tr><td colspan='3'></td></tr>
            <tr><td colspan='3'></td></tr><tr><td colspan='3'></td></tr>
            <tr><td colspan='3'></td></tr><tr><td colspan='3'></td></tr>
            <tr><td colspan='3'></td></tr><tr><td colspan='3'></td></tr>
            <tr>
            </tr>
            
            <tr>
                    <td colspan='3' align='center'><b>Datos Personales</b></td>
            </tr>
            <tr>
                    <td>
                            <span class='subtitulo'>Nombre:</span> ".nombre('PRIMER_NOMBRE',$model->persona_id)."<br>
                            <span class='subtitulo'>Apellido:</span> ".apellido('PRIMER_APELLIDO',$model->persona_id)."<br>
                            <span class='subtitulo'>Cédula de Identidad:</span> ".nacionalidadCedula('NACIONALIDAD','CEDULA', $model->persona_id)."<br>
                            <span class='subtitulo'>Inpreabogado:</span> $model->inpreabogado<br>
                            <span class='subtitulo'>Tipo de Abogado:</span> ".$model->tipoAbogado->descripcion."
                    </td>
                    <td colspan='2' align='right'><img src='" . Yii::app()->baseUrl . "/images/banavih_ndice1.png' style='width: 25%;'/></td>
            </tr>
            <br>
            <br>
            <br>
            <tr>
            
                    <td colspan='3' align='center'><b>Oficina Asignada</b></td>
            </tr>
            <br>
            <br>
            <tr>
                    <td colspan='2'><span class='subtitulo'>Oficina:</span> ".$model->oficinaId->nombre." </td>
                    <td colspan=''><span class='subtitulo'>Observaciones:</span> $model->observaciones</td>
            </tr>
   </table>

";


$mpdf = new mPDF('c', 'LETTER');
$mpdf->SetTitle(' Abogado N° '.$model->id.' '.date('h:i:A') .'');
$mpdf->SetMargins(5, 50, 30);
$mpdf->SetAuthor('BANAVIH - Banco Nacional de Vivienda y Habitat');
$mpdf->SetCreator('BANAVIH - Banco Nacional de Vivienda y Habitat');
$mpdf->SetHTMLHeader($cabecera);

$mpdf->WriteHTML($html);
$mpdf->SetFooter('Generado desde el Sistema de Protocolización el ' . date('d-m-Y') . ' a las ' . date('h:i:A') . '' . Yii::app()->user->name . ' |                        Página {PAGENO}/{nbpg}');
$mpdf->Output('Abogado-'.$model->id.' .pdf','D');
exit;
?>
