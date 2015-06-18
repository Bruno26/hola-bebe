<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_beneficiario_temporal')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_beneficiario_temporal),array('view','id'=>$data->id_beneficiario_temporal)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('persona_id')); ?>:</b>
	<?php echo CHtml::encode($data->persona_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('desarrollo_id')); ?>:</b>
	<?php echo CHtml::encode($data->desarrollo_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('unidad_habitacional_id')); ?>:</b>
	<?php echo CHtml::encode($data->unidad_habitacional_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_control')); ?>:</b>
	<?php echo CHtml::encode($data->id_control); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nacionalidad')); ?>:</b>
	<?php echo CHtml::encode($data->nacionalidad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cedula')); ?>:</b>
	<?php echo CHtml::encode($data->cedula); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_completo')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_completo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_archivo')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_archivo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_creacion')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_creacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_actualizacion')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_actualizacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usuario_id_creacion')); ?>:</b>
	<?php echo CHtml::encode($data->usuario_id_creacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usuario_id_actualizacion')); ?>:</b>
	<?php echo CHtml::encode($data->usuario_id_actualizacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estatus')); ?>:</b>
	<?php echo CHtml::encode($data->estatus); ?>
	<br />

	*/ ?>

</div>

<div class="row">
    <div class="col-md-12">
        <div>
            <h4><i class="glyphicon glyphicon-home"></i> Datos Personales</h4>
            <div class='col-md-6'> 
                <blockquote>
                    <p>
                        <b>Nombre:</b> <?php echo nombre('PRIMER_NOMBRE', $model->persona_id) ?><br/>
                        <b>Apellido:</b> <?php echo apellido('PRIMER_APELLIDO', $model->persona_id)  ?><br/>
                        <b>Cedula de Identidad:</b> <?php echo nacionalidadCedula('NACIONALIDAD','CEDULA', $model->persona_id)  ?>
                    </p>
                    <p>
                        <b>Inpreabogado:</b> <?php echo $model->inpreabogado ?><br/>
                        <b>Tipo de Abogado:</b> <?php echo $model->tipoAbogado->descripcion ?><br/>
                    </p>
                </blockquote>
            </div>
     
               
        </div>
    </div>
    <div class="col-md-12">
        <h4><i class="glyphicon glyphicon-globe"></i> Oficina Asignada</h4>
        <div class='col-md-6'> 
            <blockquote>
                <p>
                    <b> Oficina:</b> <?php echo $model->oficinaId->nombre ?><br/>
                </p>
            </blockquote>
        </div>
        <div class='col-md-6'> 
            <blockquote>
                <p>
                    <b> Observaciones:</b> <?php echo $model->observaciones ?><br/>
                </p>
            </blockquote>
        </div>
    </div>
</div>