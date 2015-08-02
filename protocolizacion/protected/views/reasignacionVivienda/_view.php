


<div class="row">
    <div class="col-md-12">
        <div>
            <h4><i class="glyphicon glyphicon-user"></i> Datos Beneficiario Anterior</h4>
            <div class='col-md-6'> 
                <blockquote>
                    <p>
                        <b>Cedula de Identidad:</b> <?php echo $model->beneficiarioIdAnterior->cedula ?><br/>
                        <b>Nombre completo:</b> <?php echo $model->beneficiarioIdAnterior->nombre_completo ?><br/>

                    </p>

                </blockquote>
            </div>
            <div class='col-md-6'>
                <div class='text-right' style='margin-right: 1em;'><img src="<?php echo Yii::app()->baseUrl; ?>/images/LOGO_BANAVIH-1.jpg" style="width: 25%;"/></div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
    <div>
            <h4><i class="glyphicon glyphicon-user"></i> Datos del Beneficiario Actual </h4>
            <div class='col-md-6'> 
                <blockquote>
                    <p>
                        <b>Cedula de Identidad:</b> <?php echo $model->beneficiarioIdActual->cedula ?><br/>
                        <b>Nombre completo:</b> <?php echo $model->beneficiarioIdActual->nombre_completo ?><br/>

                    </p>

                </blockquote>
            </div>

    </div>
    </div>

    <div class="col-md-12">
 <div>
            <h4><i class="glyphicon glyphicon-home"></i>Vivienda Reasignada</h4>
            <div class='col-md-6'> 
                <blockquote>
                    <p>
                        
                        <b>Estado:</b> <?php echo $model->vivienda->unidadHabitacional->desarrollo->fkParroquia->clvmunicipio0->clvestado0->strdescripcion ?><br/>
                        <b>Municipio:</b> <?php echo $model->vivienda->unidadHabitacional->desarrollo->fkParroquia->clvmunicipio0->strdescripcion ?><br/>
                        <b>Parroquia:</b> <?php echo $model->vivienda->unidadHabitacional->desarrollo->fkParroquia->strdescripcion ?><br/>
                        <b>Nombre del desarrollo:</b> <?php echo $model->vivienda->unidadHabitacional->desarrollo->nombre ?><br/>
                        <b>Nombre de la Unidad Familiar:</b> <?php echo $model->vivienda->unidadHabitacional->nombre ?><br/>
                        <b>Tipo de Vivienda:</b> <?php echo $model->vivienda->tipoVivienda->descripcion ?><br/>
                        <b>Número de Piso:</b> <?php echo $model->vivienda->nro_piso ?><br/>
                        <b>Número de Vivienda:</b> <?php echo $model->vivienda->nro_vivienda ?><br/>

                    </p>

                </blockquote>
            </div>

    </div>
    </div>
</div>
