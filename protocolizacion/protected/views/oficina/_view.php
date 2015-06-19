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
<div class="row">
    <div class="col-md-12">
        <h4><i class="glyphicon glyphicon-home"></i> Oficina</h4>
        <div class='col-md-6'> 
            <blockquote>
                <p>
                   <b>Nombre de la Oficina:</b> <?php echo $model->nombre ?><br/>
                   <b>Jefe Asignado:</b> <?php echo nombre('PRIMER_NOMBRE', $model->persona_id_jefe)." ".apellido('PRIMER_APELLIDO', $model->persona_id_jefe) ?><br/>
                     <b>Observaciones:</b> <?php echo $model->observaciones ?>
                </p>
    </div>
        <div class='col-md-6'>
                <div class='text-right' style='margin-right: 1em;'><img src="<?php echo Yii::app()->baseUrl; ?>/images/banavih_ndice1.png" style="width: 25%;"/></div>
            </div>
        </div>
    
    <div class="col-md-12">
        <h4><i class="glyphicon glyphicon-globe"></i> Ubicación</h4>
        <div class='col-md-6'> 
            <blockquote>
                <p>
                    <b> Estado:</b> <?php echo $model->parroquia->clvmunicipio0->clvestado0->strdescripcion ?><br/>
                    <b> Municipio:</b> <?php echo $model->parroquia->clvmunicipio0->strdescripcion ?><br/>
                    <b> Parroquia:</b> <?php echo $model->parroquia->strdescripcion ?>

                </p>
            </blockquote>
    </div>
        </div>    
</div>