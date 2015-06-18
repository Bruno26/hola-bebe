
<?php

//echo '<pre>';
//var_dump($model);
//die();
$pdf = Yii::createComponent('application.vendors.mpdf.mpdf');
$cabecera = '<img src="' . Yii::app()->request->baseUrl . '/images/cintillo.jpg"/>';


$html.="<table align='right' width='100%' border='0'>
            <tr>
                <td colspan='2' align='center'><b><font size='6' color='#B40404'>Desarrollo Habitacional: </br></br></font><font size='6'>" . $model->unidadHabitacional->desarrollo->nombre . " / " . $model->unidadHabitacional->nombre . " / " . $model->nro_vivienda . "</font>" .
        "<br/>
                <br/>
                </td>
            </tr>
            <tr><td colspan='2'></td></tr><tr><td colspan='2'></td></tr>
            <tr><td colspan='2'></td></tr><tr><td colspan='2'></td></tr>
            <tr><td colspan='2'></td></tr><tr><td colspan='2'></td></tr>
            <tr><td colspan='2'></td></tr><tr><td colspan='2'></td></tr>
            <tr>
                <td colspan='2' align='center'>
                    <b>Unidad Multifamiliar</b>
                </td>
            </tr>
            <tr>
                <td colspan='1'>
                    <br>
                            <blockquote style='padding: 10px 20px;   margin: 0 0 20px;   font-size: 17.5px;   border-left: 5px solid #eee;'>
                                <p><b> Nombre del Desarrollo: </b>" . $model->unidadHabitacional->desarrollo->nombre .
        "<br/>
                                <b> Nombre de la Unidad Habitacional:</b> " . $model->unidadHabitacional->nombre .
        "<br/></p>
                            </blockquote>
                </td>
                <td colspan='1' align='right'><img src='" . Yii::app()->baseUrl . "/images/banavih_ndice1.png' style='width: 25%;'/>
                </td>
            </tr>
            <tr><td colspan='2'></td></tr><tr><td colspan='2'></td></tr>
            <tr><td colspan='2'></td></tr><tr><td colspan='2'></td></tr>
            <tr><td colspan='2'></td></tr><tr><td colspan='2'></td></tr>
            <tr><td colspan='2'></td></tr><tr><td colspan='2'></td></tr>
            <tr>
                <td colspan='2' align='center'>
                    <b>Ubicación del Desarrollo</b>
                </td>
            </tr>
            <tr>
                <td colspan='2'>
                    <br><br>
                        <div class='col-md-6' style ='margin-left: 0.1%; margin-right: 20%; width: 40%;'>                    
                            <blockquote style='padding: 10px 20px;   margin: 0 0 20px;   font-size: 17.5px;   border-left: 5px solid #eee;'>
                                <p>
                                <b> Estado:</b> " . $model->unidadHabitacional->desarrollo->fkParroquia->clvmunicipio0->clvestado0->strdescripcion .
        "<br/>
                                <b> Municipio:</b> " . $model->unidadHabitacional->desarrollo->fkParroquia->clvmunicipio0->strdescripcion .
        "<br/>
                                <b> Parroquia:</b> " . $model->unidadHabitacional->desarrollo->fkParroquia->strdescripcion .
        "<br/></p>
                            </blockquote>
                        </div>
                </td>
            </tr>
            <tr><td colspan='2'></td></tr><tr><td colspan='2'></td></tr>
            <tr><td colspan='2'></td></tr><tr><td colspan='2'></td></tr>
            <tr><td colspan='2'></td></tr><tr><td colspan='2'></td></tr>
            <tr><td colspan='2'></td></tr><tr><td colspan='2'></td></tr>
            <tr>
                <td colspan='2' align='center'>
                    <b>Linderos</b>
                </td>
            </tr>
            <tr>
                <td colspan='1'>
                    <br><br>
                        <div class='col-md-6' style ='margin-left: 0.1%; margin-right: 20%; width: 40%;'> 
                            <blockquote style='padding: 10px 20px;   margin: 0 0 20px;   font-size: 17.5px;   border-left: 5px solid #eee;'>
                                <p><b> Lindero Norte: </b>" . $model->lindero_norte .
        "<br/>
                                <b> Lindero Sur:</b> " . $model->lindero_sur .
        "<br/>
                                <b> Lindero Este:</b> " . $model->lindero_este .
        "</br></p>
                            </blockquote>
                        </div>
                </td>
                <td colspan='1'>
                    </br>
                    <div class='col-md-6' style ='margin-left: 0.1%; margin-right: 20%; width: 40%;'> 
                            <blockquote style='padding: 10px 20px;   margin: 0 0 20px;   font-size: 17.5px;   border-left: 5px solid #eee;'>
                                <b> Lindero Oeste:</b> " . $model->lindero_oeste .
        "<br/>
                                <b> Coordenadas:</b> " . $model->coordenadas .
        "<br/></p>
                            </blockquote>
                    </div>
                </td>
            </tr>
            <tr><td colspan='2'></td></tr><tr><td colspan='2'></td></tr>
            <tr><td colspan='2'></td></tr><tr><td colspan='2'></td></tr>
            <tr><td colspan='2'></td></tr><tr><td colspan='2'></td></tr>
            <tr><td colspan='2'></td></tr><tr><td colspan='2'></td></tr>
            <tr>
                <td colspan='2' align='center'>
                    <b>Detalles de la UnidadFamiliar</b>
                </td>
            </tr>
            <tr>
                <td colspan='1'>
                    <br><br>
                        <div class='col-md-6' style ='margin-left: 0.1%; margin-right: 20%; width: 40%;'>                    
                            <blockquote style='padding: 10px 20px;   margin: 0 0 20px;   font-size: 17.5px;   border-left: 5px solid #eee;'>
                                <p>
                                <b> Tipo de Vivienda:</b> " . $model->tipoVivienda->descripcion .
        "<br/>
                                <b> Piso:</b> " . $model->nro_piso .
        "<br/>
                                <b> N° de Vivienda:</b> " . $model->nro_vivienda .
        "<br/>
                                <b> Sala:</b> ";
if ($model->sala = TRUE):;
    $html.= "SI";
else:
    $html.= "NO";
endif;
$html.= "<br/>
                                <b> Comedor:</b> ";
if ($model->comedor = TRUE):;
    $html.= "SI";
else:
    $html.= "NO";
endif;
$html.= "<br/>
                                <b> Cocina:</b> ";
if ($model->cocina = TRUE):;
    $html.= "SI";
else:
    $html.= "NO";
endif;
$html.= "<br/></p>
                            </blockquote>
                        </div>
                </td>
                <td colspan='1'>
                    <br><br>
                        <div class='col-md-6' style ='margin-left: 0.1%; margin-right: 20%; width: 40%;'>                    
                            <blockquote style='padding: 10px 20px;   margin: 0 0 20px;   font-size: 17.5px;   border-left: 5px solid #eee;'>
                                <p><b> Lavandero:</b> ";
if ($model->lavandero = TRUE):;
    $html.= "SI";
else:
    $html.= "NO";
endif;
$html.= "<br/>
                                <b> N° de Habitantes:</b> " . $model->nro_habitaciones .
        "<br/>
                                <b> N° de Baños:</b> " . $model->nro_banos .
        "<br/>
                                <b> Puesto de Estacionamiento: </b>" . $model->descripcion_estac .
        "<br/>
                                <b> N° de Estacionamiento: </b>" . $model->nro_estacionamientos .
        "<br/>
                                <b>Precio de Vivienda: </b>" . Generico::FormatearBs($model->precio_vivienda) .
        "Bs.<br/></p>
                            </blockquote>
                        </div>
                </td>
            </tr>
        </table>";

$mpdf = new mPDF('c', 'LETTER');
$mpdf->SetTitle('<b>Detalle: </b>' . $model->unidadHabitacional->desarrollo->nombre . ' / ' . $model->unidadHabitacional->nombre . ' / ' . $model->nro_vivienda);
$mpdf->SetMargins(5, 280, 30);
$mpdf->SetAuthor('BANAVIH - Banco Nacional de Vivienda y Habitat');
$mpdf->SetCreator('BANAVIH - Banco Nacional de Vivienda y Habitat');
$mpdf->SetHTMLHeader($cabecera);
$mpdf->SetFooter('Generado desde el Sistema de Protocolización el ' . date('d-m-Y') . ' a las ' . date('h:i:A') . '' . Yii::app()->user->name . ' |                        Página {PAGENO}/{nbpg}');
//$n = dirname(dirname(dirname(__DIR__))) . '/css/style_pdf.css';
//$stylesheet = file_get_contents('/var/www/hola-bebeYu/protocolizacion/css/stylepdf.css');
//$m//pdf->WriteHTML($stylesheet, 1);
$mpdf->WriteHTML($html);
$mpdf->Output('Desarrollo-Habitacional-' . $model->id_vivienda . ' .pdf', 'D');
exit;
?>
