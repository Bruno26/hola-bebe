<?php

$pdf = Yii::createComponent('application.vendors.mpdf.mpdf');
$cabecera = '<img src="' . Yii::app()->request->baseUrl . '/images/cintillo_200_admirable.jpg"/>';


$html.=

        "<div style='text-align:center; width:100%; margin-left:0%;margin-top:4%'>
            <br><br><br>
<h2><strong><FONT COLOR='#000080'>SIPP/ Reporte Consolidado de Comunas y Consejos Comunales /" . date('d-m-Y') . "</FONT></strong></h2><br/>
</div>


";

$html.=

        "<div style='text-align:center; width:100%; margin-left:0%;margin-top:4%'>
            <br><br><br>
<h2><strong><FONT COLOR='#000080'>Desarrollo Habitacional /" . date('d-m-Y') . "</FONT></strong></h2><br/>
</div>


";


$html.="
hola bebe
<div class='col-md-12'>
    <div>
        <h4><i class='glyphicon glyphicon-home'></i> Desarrollo Habitacional</h4>
        <div class='col-md-6'>
            <blockquote>
                <p>
                    <b>Nombre del Desarrollo:</b> $model->nombre <br/>

                </p>
                <p>
                    <b>Descripción del Desarrollo:</b> $model->descripcion <br/>

                </p>
            </blockquote>
        </div>


    </div>
</div>

";

$mpdf = new mPDF('c', 'LETTER');
$mpdf->SetTitle(' Desarrollo Habitacional N° '.$model->id_desarrollo.' - '.$model->nombre.' '.date('h:i:A') .'');
$mpdf->SetMargins(5, 50, 30);
$mpdf->SetAuthor('BANAVIH - Banco Nacional de Vivienda y Habitat');
$mpdf->SetCreator('BANAVIH - Banco Nacional de Vivienda y Habitat');
$mpdf->SetHTMLHeader($cabecera);
$mpdf->SetFooter('Generado desde el Sistema de Protocolización el ' . date('d-m-Y') . ' a las ' . date('h:i:A') .' por el usuario ' . Yii::app()->user->name .' | Página {PAGENO}/{nbpg}');
$mpdf->WriteHTML($html);
$mpdf->Output('Desarrollo-Habitacional-'.$model->id_desarrollo. ' .pdf','D');
exit;
?>
