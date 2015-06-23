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
        $fecha_asignacion = substr($model->fecha_asignacion,0,10);
        $invert = explode("-",$fecha_asignacion); 

        $fecha_invert = $invert[2]."-".$invert[1]."-".$invert[0]; 

?>
<div class="row">
    <div class="col-md-12">
        <h4><i class="glyphicon glyphicon-globe"></i> Lugar a Censar</h4>
        <div class='col-md-6'> 
            <blockquote>
                <p>
                   <b>Nombre del Desarrollo:</b> <?php echo $model->desarrollo->nombre ?><br/>
                </p>
                <p>
                   <b>Nombre de la Oficina:</b> <?php echo $model->oficina->nombre ?><br/>
                </p>
                <p>
                   <b>Censado:</b> <?php echo ($model->censado)?"SI":"NO" ?><br/>
                </p>
            </blockquote>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <h4><i class="glyphicon glyphicon-user"></i> Persona Asignada</h4>
        <div class='col-md-6'> 
            <blockquote>
                <p>
                    <b>Nombre:</b> <?php echo nombre('PRIMER_NOMBRE', $model->persona_id) ?><br/>
                    <b>Apellido:</b> <?php echo apellido('PRIMER_APELLIDO', $model->persona_id)  ?><br/>
                    <b>Cedula de Identidad:</b> <?php echo nacionalidadCedula('NACIONALIDAD','CEDULA', $model->persona_id)  ?>
                </p>
            </blockquote>
        </div>
        <div class='col-md-6'> 
            <blockquote>
                   <b>Fecha de Asignación:</b> <?php echo Yii::app()->dateFormatter->format("d/M/y - hh:mm a", strtotime($model->fecha_asignacion)) ?><br/>
                </p>
            </blockquote>
        </div>
    </div>
</div>