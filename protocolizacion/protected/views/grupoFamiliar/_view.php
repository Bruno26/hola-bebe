<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_grupo_familiar')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_grupo_familiar),array('view','id'=>$data->id_grupo_familiar)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('unidad_familiar_id')); ?>:</b>
	<?php echo CHtml::encode($data->unidad_familiar_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('persona_id')); ?>:</b>
	<?php echo CHtml::encode($data->persona_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gen_parentesco_id')); ?>:</b>
	<?php echo CHtml::encode($data->gen_parentesco_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_sujeto_atencion')); ?>:</b>
	<?php echo CHtml::encode($data->tipo_sujeto_atencion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ingreso_mensual')); ?>:</b>
	<?php echo CHtml::encode($data->ingreso_mensual); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fuente_datos_entrada_id')); ?>:</b>
	<?php echo CHtml::encode($data->fuente_datos_entrada_id); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('cotiza_faov')); ?>:</b>
	<?php echo CHtml::encode($data->cotiza_faov); ?>
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