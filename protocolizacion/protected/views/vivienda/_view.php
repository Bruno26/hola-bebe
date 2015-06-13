<?php //  echo '<pre>';var_dump($model);die();  ?>

<div class="row">
    <div class="col-md-12">
        <div>
            <h4><i class="glyphicon glyphicon-home"></i> Unidad Multifamiliar</h4>
            <div class='col-md-6'> 
                <blockquote>
                    <p>
                        <b>Nombre del Desarrollo: </b><?php echo $model->unidadHabitacional->desarrollo->nombre; ?><br/>
                        <b>Nombre de la Unidad Habitacional:</b> <?php echo $model->unidadHabitacional->nombre; ?><br/>
                    </p>
                </blockquote>
            </div>
            <div class='col-md-6'>
                <div class='text-right' style='margin-right: 1em;'><img src="<?php echo Yii::app()->baseUrl; ?>/images/banavih_ndice1.png" style="width: 25%;"/></div>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div>  
            <h4><i class="glyphicon glyphicon-globe"></i> Ubicación del Desarrollo</h4>
            <div class='col-md-6'> 
                <blockquote>
                    <p>
                        <b> Estado:</b> <?php echo $model->unidadHabitacional->desarrollo->fkParroquia->clvmunicipio0->clvestado0->strdescripcion ?><br/>
                        <b> Municipio:</b> <?php echo $model->unidadHabitacional->desarrollo->fkParroquia->clvmunicipio0->strdescripcion ?><br/>
                        <b> Parroquia:</b> <?php echo $model->unidadHabitacional->desarrollo->fkParroquia->strdescripcion ?>
                    </p>
                </blockquote>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div>  
            <h4><i class="glyphicon glyphicon-globe"></i> Linderos</h4>
            <div class='col-md-6'> 
                <blockquote>
                    <p>
                        <b> Lindero Norte:</b> <?php echo $model->lindero_norte ?><br/>
                        <b> Lindero Sur:</b> <?php echo $model->lindero_sur; ?><br/>
                        <b> Lindero Este:</b> <?php echo $model->lindero_este; ?>
                    </p>
                </blockquote>
            </div>
            <div class='col-md-6'> 
                <blockquote>
                    <p>
                        <b> Lindero Oeste:</b> <?php echo $model->lindero_oeste; ?><br/>
                        <b> Coordenadas:</b> <?php echo $model->coordenadas; ?>
                    </p>
                </blockquote>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div>
            <h4><i class="glyphicon glyphicon-home"></i> Detalles de la UnidadFamiliar</h4>
            <div class='col-md-6'> 
                <blockquote>
                    <p>
                        <b>Tipo Vivienda:</b> <?php echo $model->tipoVivienda->descripcion; ?><br/>
                        <b>Piso:</b> <?php echo $model->nro_piso; ?><br/>
                        <b>N° de Vivienda:</b> <?php echo $model->nro_vivienda; ?><br/>
                        <b>Sala:</b> 
                            <?php
                            if ($model->sala = TRUE): echo'SI';
                            else: echo 'NO';
                            endif;
                            ?>
                        <br/>
                        <b>Comedor:</b> 
                            <?php
                            if ($model->comedor = TRUE): echo'SI';
                            else: echo 'NO';
                            endif;
                            ?>
                        <br/>
                        <b>Cocina:</b> 
                            <?php
                            if ($model->cocina = TRUE): echo'SI';
                            else: echo 'NO';
                            endif;
                            ?>
                    </p>
                </blockquote>
            </div>
            <div class='col-md-6'> 
                <blockquote>
                    <p>
                        <b>Lavandero: </b>
                            <?php
                            if ($model->lavandero = TRUE): echo'SI';
                            else: echo 'NO';
                            endif;
                            ?>
                        <br/>
                        <b>N° de Habitantes: </b><?php echo $model->nro_habitaciones; ?><br/>
                        <b>N° de Baños: </b><?php echo $model->nro_banos; ?><br/>
                        <b>Puesto de Estacionamiento: </b><?php echo $model->descripcion_estac; ?><br/>
                        <b>N° de Estacionamiento: </b><?php echo $model->nro_estacionamientos; ?><br/>
                        <b>Precio de Vivienda: </b><?php echo Generico::FormatearBs($model->precio_vivienda);?> Bs<br/>
                    </p>
                </blockquote>
            </div>
        </div>
    </div>
</div>


