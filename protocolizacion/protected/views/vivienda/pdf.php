
<?php
//echo '<pre>'; var_dump($model);//die();
$pdf = Yii::createComponent('application.vendors.mpdf.mpdf');
$cabecera = '<img src="' . Yii::app()->request->baseUrl . '/images/cintillo.jpg"/>';

//
//
//$html.= "<style>
//            #prueba{
//               border:2px solid;
//               border-radius:10px;
//               margin-left: -15px;
//        margin-right: -15px;
//        box-sizing: border-box;
//        font-size: 100%;
//        font: inherit;
//        vertical-align: baseline;
//            } 
//            #prueba1{
//               border:2px solid;
//               border-radius:10px;
//            } 
//            .negrillas{
//               font-weight: bold;
//               color:blue;
//            }
//        </style>";
///**
// * ESTILO DE LA TABLA
// */
//
//$n = dirname(dirname(dirname(__DIR__))) . '/img/banner.png';
//$html.= '<img src="' . $n . '"/>';
//$html.="<div style='text-align:center; font-size:20px; margin-top:50px; border: solid 0px #000;'>";
//$html.="<b></b>";
//$html.="<br>";
//$html.="<br/></div>";
//$html.= '<table>        
//        <tr>
//        <td colspan="2" align="justify" class="negrillas" id="prueba">
//            Reporte del Sistema de Atención al Ciudadano.
//               </td>           
//           </tr>
//        </table>';
//
//$html.='<div id="prueba">
//<style type="text/css">
//.tg  {border-collapse:collapse;border-spacing:0;border-color:#999;}
//.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#999;color:#444;background-color:#F7FDFA;}
//.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#999;color:#fff;background-color:#26ADE4;}
//.tg .tg-gyhc{background-color:#fd6864}
//.tg .tg-rpj7{background-color:#fd6864}
//</style>';


//$html.="
//    <style>
//
//    .row {
//        margin-left: -15px;
//        margin-right: -15px;
//        box-sizing: border-box;
//        font-size: 100%;
//        font: inherit;
//        vertical-align: baseline;
//     }
//     .col-md-12 {
//        width: 100%;
//        float: left;
//        position: relative;
//        min-height: 1px;
//        padding-left: 15px;margin-left: -15px;
//        margin-right: -15px;
//        box-sizing: border-box;
//        font-size: 100%;
//        font: inherit;
//        vertical-align: baseline;
//        padding-right: 15px;
//        font-size: 100%;
//        font: inherit;
//        vertical-align: baseline;
//     }
//     .col-md-6 {
//       width: 50%;
//       float: left;
//       position: relative;
//       min-height: 1px;
//       padding-left: 15px;
//       padding-right: 15px;
//       font-size: 100%;
//       font: inherit;
//       box-sizing: border-box;
//       vertical-align: baseline;
//     }
//     .blockquote {
//       padding: 10px 20px;
//       margin: 0 0 20px;
//       font-size: 17.5px;
//       border-left: 5px solid #eee;
//       color: #666;
//       font-style: italic;
//       font: inherit;
//       vertical-align: baseline;
//       box-sizing: border-box;
//     }
//    </style>";
//    

//$html.="<table align='right' width='25%'>
//                <tr>
//                    <td></td>
//                    <td><img src='".Yii::app()->baseUrl."/images/banavih_ndice1.png' style='width: 25%;'/>
//                    </td>
//                </tr>
//            </table>";

//$html.="<div class='row' style ='margin-left: 1%; margin-right: 1%;'>
//    <div class='col-md-12' style ='margin-left: 0.1%; margin-right: 0.1%;'>
$html="
    <style>
    @page {
  size: 8.5in 11in;  <length>{1,2} | auto | portrait | landscape  ('em' 'ex' and % are not allowed; length values are width height
  margin: 10%; <any of the usual CSS values for margins> (% of page-box width for LR, of height for TB)
  margin-header: 5mm; <any of the usual CSS values for margins>
  margin-footer: 5mm; <any of the usual CSS values for margins>
  marks: crop | cross | none
  header: html_myHTMLHeaderOdd;
  footer: html_myHTMLFooterOdd;
  background: ...
  background-image: ...
  background-position ...
  background-repeat ...
  background-color ...
  background-gradient: ...
}
    .row {
        margin-left: -15px;
        margin-right: -15px;
        box-sizing: border-box;
        font-size: 100%;
        font: inherit;
        vertical-align: baseline;
     }
     .col-md-12 {
        width: 100%;
        float: left;
        position: relative;
        min-height: 1px;
        padding-left: 15px;
        padding-right: 15px;
        font-size: 100%;
        font: inherit;
        vertical-align: baseline;
     }
     .col-md-6 {
       width: 50%;
       float: left;
       position: relative;
       min-height: 1px;
       padding-left: 15px;
       padding-right: 15px;
       font-size: 100%;
       font: inherit;
       box-sizing: border-box;
       vertical-align: baseline;
     }
     .blockquote {
       padding: 10px 20px;
       margin: 0 0 20px;
       font-size: 17.5px;
       border-left: 5px solid #eee;
       color: #666;
       font-style: italic;
       font: inherit;
       vertical-align: baseline;
       box-sizing: border-box;
     }
    </style>";
    
$html.="<div class='row' style ='margin-left: -15px; margin-right: -15px; box-sizing: border-box; margin: 0; padding: 0; border: 0; font-size: 100%; font: inherit; vertical-align: baseline;'>
    <div class='col-md-12'>
        <div>
            <h4><i class='glyphicon glyphicon-home'></i> Unidad Multifamiliar</h4>
            <div class='col-md-6' style ='margin-left: 0.1%; margin-right: 20%; width: 40%;'> 
                <blockquote style='padding: 10px 20px;   margin: 0 0 20px;   font-size: 17.5px;   border-left: 5px solid #eee;'>
                    <p><b>Nombre del Desarrollo: </b>".$model->unidadHabitacional->desarrollo->nombre;
$html.="            <br/>
                    <b>Nombre de la Unidad Habitacional:</b> ".$model->unidadHabitacional->nombre;
$html.="            <br/></p>
                </blockquote>
            </div>
        </div>
    </div>
    <div class='col-md-12'>
        <div>  
            <h4><i class='glyphicon glyphicon-globe'></i> Ubicación del Desarrollo</h4>
            
                <blockquote>
                    <p>
                        <b> Estado:</b> ".$model->unidadHabitacional->desarrollo->fkParroquia->clvmunicipio0->clvestado0->strdescripcion;
$html.="               <br/>
                        <b> Municipio:</b> ".$model->unidadHabitacional->desarrollo->fkParroquia->clvmunicipio0->strdescripcion;
$html.="               <br/>
                        <b> Parroquia:</b> ".$model->unidadHabitacional->desarrollo->fkParroquia->strdescripcion;
$html.="           </p>
                </blockquote>
            
        </div>
    </div>
    <div class='col-md-12'>
        <div>  
            <h4><i class='glyphicon glyphicon-globe'></i> Linderos</h4>
            <div class='col-md-6'> 
                <blockquote>
                    <p>
                        <b> Lindero Norte:</b> ".$model->lindero_norte;
$html.="               <br/>
                        <b> Lindero Sur:</b> ".$model->lindero_sur; 
$html.="               <br/>
                        <b> Lindero Este:</b> ".$model->lindero_este;
$html.="           </p>
                </blockquote>
            </div>
            <div class='col-md-6'> 
                <blockquote>
                    <p>
                        <b> Lindero Oeste:</b> ".$model->lindero_oeste;
$html.="               <b> Coordenadas:</b> ".$model->coordenadas;
$html.="           </p>
                </blockquote>
            </div>
        </div>
    </div>
    <div class='col-md-12'>
        <div>
            <h4><i class='glyphicon glyphicon-home'></i> Detalles de la UnidadFamiliar</h4>
            <div class='col-md-6'> 
                <blockquote>
                    <p>
                        <b>Tipo Vivienda:</b> ".$model->tipoVivienda->descripcion;
$html.="               <br/>
                        <b>Piso:</b> ".$model->nro_piso;
$html.="               <br/>
                        <b>N° de Vivienda:</b> ".$model->nro_vivienda;
$html.="               <br/>
                        <b>Sala:</b> ";
                           if ($model->sala = TRUE):;
$html.=                         "SI";
                            else:
$html.=                         "NO";
                            endif;
$html.="               <br/>
                        <b>Comedor:</b> ";
                            if ($model->comedor = TRUE):;
$html.=                         "SI";
                            else:
$html.=                         "NO";
                            endif;
$html.="               <br/>
                        <b>Cocina:</b> ";
                            if ($model->cocina = TRUE):;
$html.=                         "SI";
                            else:
$html.=                         "NO";
                            endif;
$html.="           </p>
                </blockquote>
            </div>
            <div class='col-md-6'> 
                <blockquote>
                    <p>
                        <b>Lavandero: </b>";
                            if ($model->lavandero = TRUE):;
$html.=                         "SI";
                            else:
$html.=                         "NO";
                            endif;
$html.="               <br/>
                        <b>N° de Habitantes: </b>". $model->nro_habitaciones; 
$html.="               <br/>
                        <b>N° de Baños: </b>". $model->nro_banos; 
$html.="               <br/>
                        <b>Puesto de Estacionamiento: </b>". $model->descripcion_estac;
$html.="               <br/>
                        <b>N° de Estacionamiento: </b>". $model->nro_estacionamientos;
$html.="               <br/>
                        <b>Precio de Vivienda: </b>". Generico::FormatearBs($model->precio_vivienda);
$html.="               Bs.
                    </p>
                </blockquote>
            </div>
        </div>
    </div>
</div>
";
$mpdf = new mPDF('c', 'LETTER');//var_dump($model);die();
$mpdf->SetTitle('<b>Detalle: </b>'.$model->unidadHabitacional->desarrollo->nombre.' / '.$model->unidadHabitacional->nombre.' / '.$model->nro_vivienda);
//$mpdf->SetMargins(5, 50, arriba);
$mpdf->SetMargins(5, 280, 30);
$mpdf->SetAuthor('BANAVIH - Banco Nacional de Vivienda y Habitat');
$mpdf->SetCreator('BANAVIH - Banco Nacional de Vivienda y Habitat');
$mpdf->SetHTMLHeader($cabecera);
$mpdf->SetFooter('Generado desde el Sistema de Protocolización el ' . date('d-m-Y') . ' a las ' . date('h:i:A') .'' . Yii::app()->user->name .' |                        Página {PAGENO}/{nbpg}');
$n = dirname(dirname(dirname(__DIR__))) . '/css/style_pdf.css';
$stylesheet = file_get_contents('/var/www/hola-bebe/protocolizacion/css/stylepdf.css');
$mpdf->WriteHTML($stylesheet,1);
$mpdf->WriteHTML($html,2);var_dump($html);die();
$mpdf->Output('Desarrollo-Habitacional-'.$model->id_vivienda. ' .pdf','D');
exit;
?>
