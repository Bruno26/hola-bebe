
<div class="row">
    <div class="col-md-12">
        <div>
            <h4><i class="glyphicon glyphicon-globe"></i> Ubicación del Desarrollo</h4>
            <div class='col-md-6'> 
                <blockquote>
                    <p>
                        <b>Estado:</b> <?php echo $model->desarrollo->fkParroquia->clvmunicipio0->clvestado0->strdescripcion ?><br/>
                    </p>
                    <p>
                        <b>Municipio:</b> <?php echo $model->desarrollo->fkParroquia->clvmunicipio0->strdescripcion ?><br/>
                    </p>
                    <p>
                        <b>Parroquia:</b> <?php echo $model->desarrollo->fkParroquia->strdescripcion ?><br/>
                    </p>

                </blockquote>
            </div>
            <div class='col-md-6'>
                <div class='text-right' style='margin-right: 1em;'><img src="<?php echo Yii::app()->baseUrl; ?>/images/banavih_ndice1.png" style="width: 25%;"/></div>
            </div>
        </div>
    </div>


    <div class="col-md-12">
        <h4><i class="glyphicon glyphicon-home"></i> Unidad Multifamiliar</h4>
        <div class='col-md-6'> 
            <blockquote>
                <p>
                    <b>Nombre del Desarollo:</b> <?php echo $model->desarrollo->nombre ?><br/>
                </p>
                <p>
                    <b>Nombre de la Unidad Multifamiliar:</b> <?php echo $model->nombre ?><br/>
                </p>
                <p>
                    <b>Tipo de Inmueble:</b> <?php echo $model->genTipoInmueble->descripcion ?><br/>
                </p>
            </blockquote>
        </div>
         <h4><i class="glyphicon glyphicon-globe"></i> Linderos</h4>
        <div class='col-md-6'> 
            <blockquote>
                <p>
                    <b>Lindero Norte:</b> <?php echo $model->lindero_norte ?><br/>
                </p>
                <p>
                    <b>Lindero Sur:</b> <?php echo $model->lindero_sur ?><br/>
                </p>
                <p>
                    <b>Lindero Este:</b> <?php echo $model->lindero_este?><br/>
                </p>
                <p>
                    <b>Lindero Oeste:</b> <?php echo $model->lindero_oeste?><br/>
                </p>
            </blockquote>
        </div>

    </div>
</div>