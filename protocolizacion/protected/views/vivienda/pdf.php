<?php
//echo '<pre>'; var_dump($model);//die();
$pdf = Yii::createComponent('application.vendors.mpdf.mpdf');
$cabecera = '<img src="' . Yii::app()->request->baseUrl . '/images/cintillo.jpg"/>';


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
            <div class='col-md-6'> 
                <blockquote>
                    <p><b>Nombre del Desarrollo: </b>".$model->unidadHabitacional->desarrollo->nombre;
$html.="            <br/>
                    <b>Nombre de la Unidad Habitacional:</b> ".$model->unidadHabitacional->nombre;
$html.="            <br/></p>
                </blockquote>
            </div>
            <div class='col-md-6'>
                <div class='text-right' style='margin-right: 1em;'>
                    <img src='".Yii::app()->baseUrl."/images/banavih_ndice1.png' style='width: 25%;'/>              
                </div>
            </div>
        </div>
    </div>

    <div class='col-md-12'>
        <div>  
            <h4><i class='glyphicon glyphicon-globe'></i> Ubicación del Desarrollo</h4>
            <div class='col-md-6'> 
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
$mpdf->WriteHTML($html);
$mpdf->Output('Desarrollo-Habitacional-'.$model->id_vivienda. ' .pdf','D');var_dump($html);die();
exit;
?>
