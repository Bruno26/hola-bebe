<?php //  echo '<pre>';var_dump($model);die();  ?>

<div class="row">
    <div class="col-md-12">
        <div>
            <h4><i class="glyphicon glyphicon-home"></i> Unidad Multifamiliar</h4>
            <div class='col-md-6'> 
                <blockquote>
                    <p>
                        <b>Id de la Vivienda: </b><?php echo $model->id_vivienda; ?><br/>

                    </p>
                    <p>
                        <b>Nombre del Desarrollo: </b><?php echo $model->unidadHabitacional->desarrollo->nombre; ?><br/>

                    </p>
                    <p>
                        <b>Nombre de la Unidad Habitacional:</b> <?php echo $model->unidadHabitacional->nombre; ?><br/>
                        <!--<b> Fuente de Finaciamiento:</b> <?php // echo $model->fuenteFinanciamiento->nombre_fuente_financiamiento   ?><br/>-->

                    </p>
                </blockquote>
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
                        <b> Lindero Este:</b> <?php echo $model->lindero_este; ?><br/>
                        <b> Lindero Oeste:</b> <?php echo $model->lindero_oeste; ?>
                    </p>
                </blockquote>
            </div>
            <h4><i class="glyphicon glyphicon-globe"></i> Coordenadas</h4>
            <div class='col-md-6'> 
                <blockquote>
                    <p>
                        <b> Coordenadas:</b> <?php echo $model->coordenadas; ?><br/>
                    </p>
                </blockquote>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div>
            <h4><i class="glyphicon glyphicon-home"></i> Detalles de la Vivienda</h4>
            <div class='col-md-6'> 
                <blockquote>
                    <p>
                        <b>Unidad Habitacional:</b> <?php echo $model->unidad_habitacional_id; ?><br/>
                    </p>
                    <p>
                        <b>Tipo Vivienda:</b> <?php echo $model->tipo_vivienda_id; ?><br/>
                    </p>
                    <p>
                        <b>Construcción Mt2:</b> <?php echo $model->construccion_mt2; ?><br/>
                    </p>
                    <p>
                        <b>Piso:</b> <?php echo $model->nro_piso; ?><br/>
                    </p>
                    <p>
                        <b>N° de Vivienda:</b> <?php echo $model->nro_vivienda; ?><br/>
                    </p>
                    <p>
                        <b>Sala:</b> <?php echo $model->sala; ?><br/>
                    </p>
                    <p>
                        <b>Comedor:</b> <?php echo $model->comedor; ?><br/>
                    </p>
                    <p>
                        <b>Cocina:</b> <?php echo $model->cocina; ?><br/>
                    </p>
                    <p>
                        <b>Lavandero:</b> <?php echo $model->lavandero; ?><br/>
                    </p>
                    <p>
                        <b>N° de Habitantes:</b> <?php echo $model->nro_habitaciones; ?><br/>
                    </p>
                    <p>
                        <b>N° de Baños:</b> <?php echo $model->nro_banos; ?><br/>
                    </p>
                    <p>
                        <b>Puesto de Estacionamiento:</b> <?php echo $model->descripcion_estac; ?><br/>
                    </p>
                    <p>
                        <b>N° de Estacionamiento:</b> <?php echo $model->nro_estacionamientos; ?><br/>
                    </p>
                    <p>
                        <b>Precio de Vivienda:</b> <?php echo $model->precio_vivienda; ?><br/>
                    </p>
                </blockquote>
            </div>
        </div>
    </div>
</div>
