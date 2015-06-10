<?php
//echo '<pre>';var_dump($model);die();


$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => 'vsw-solicitud-recibido-form',
    'enableAjaxValidation' => false,
        ));
?>


<div class="row">
    <div class="col-md-12">
        <div>
            <h4><i class="glyphicon glyphicon-home"></i> Desarrollo Habitacional</h4>
            <div class='col-md-6'> 
                <blockquote>
                    <p>
                        <b>Nombre del Desarrollo:</b> <?php echo $model->nombre ?><br/>

                    </p>
                </blockquote>
            </div>
            <div class='col-md-6'> 
                <blockquote>
                    <p>
                        <b>Descripcion del Desarrollo:</b> <?php echo $model->descripcion ?><br/>

                    </p>
                </blockquote>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <h4><i class="glyphicon glyphicon-globe"></i> Ubicación del Desarrollo</h4>
        <div class='col-md-6'> 
            <blockquote>
                <p>
                    <b> Estado:</b> <?php echo $model->fkParroquia->clvmunicipio0->clvestado0->strdescripcion ?><br/>
                    <b> Municipio:</b> <?php echo $model->fkParroquia->clvmunicipio0->strdescripcion ?><br/>
                    <b> Parroquia:</b> <?php echo $model->fkParroquia->strdescripcion ?>

                </p>
            </blockquote>
        </div>
        <div class='col-md-6'> 
            <blockquote>
                <p>
                    <b> Urbanización/Barrio:</b> <?php echo $model->urban_barrio ?><br/>
                    <b> Avenida/Calle/Esquina/Carretera:</b> <?php echo $model->av_call_esq_carr ?><br/>
                    <b> Zona:</b> <?php echo $model->zona ?><br/>

                </p>
            </blockquote>
        </div>
    </div>
    <div class='col-md-12'> 
        <h4><i class="glyphicon glyphicon-map-marker"></i> Linderos</h4>
        <div class='col-md-6'> 
            <blockquote>
                <p>
                    <b> Lindero Norte:</b> <?php echo $model->lindero_norte ?><br/>
                    <b> Lindero Sur:</b> <?php echo $model->lindero_sur ?><br/>
                    <b> Lindero Oeste:</b> <?php echo $model->lindero_este ?><br/>
                    <b> Lindero Este:</b> <?php echo $model->lindero_oeste ?><br/>

                </p>
            </blockquote>
        </div>
        <div class='col-md-6'> 
            <blockquote>
                <p>
                    <b> Coordenadas:</b> <?php echo $model->lindero_norte ?><br/>
                    <b> Lote Terreno Mt2:</b> <?php echo $model->lindero_sur ?><br/>


                </p>
            </blockquote>
        </div>
    </div>


    <div class='col-md-12'>  
         <h4><i class="glyphicon glyphicon-th"></i> Programa</h4>
        <div class="col-md-6">
            <blockquote>
                <p>
                    <b> Programa:</b> <?php echo $model->programa->nombre_programa ?><br/>
                    <b> Fuente de Finaciamiento:</b> <?php echo $model->fuenteFinanciamiento->nombre_fuente_financiamiento ?><br/>
                    <b> Ente Ejecutor:</b> <?php echo $model->enteEjecutor->nombre_ente_ejecutor ?><br/>

                </p>
            </blockquote>
        </div>
        <div class="col-md-6">
            <blockquote>
                <p>
                    <b>Titularidad del Terreno:</b> <?php if ($model->titularidad_del_terreno == TRUE) { ?>
                        <?php echo 'SI'; ?> <br>
                        <b> Fecha de Transferencia:</b> 
                        <?php echo date('d/m/Y', strtotime($model->fecha_transferencia)); ?> <br>
                        <?php
                    } else {
                        echo 'NO';
                    }
                    ?><br/>

                </p>
            </blockquote>
        </div>


    </div>
</div>






<?php $this->endWidget(); ?>