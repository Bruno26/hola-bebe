<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_registro_publico')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_registro_publico),array('view','id'=>$data->id_registro_publico)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_registro_publico')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_registro_publico); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('parroquia_id')); ?>:</b>
	<?php echo CHtml::encode($data->parroquia_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estatus')); ?>:</b>
	<?php echo CHtml::encode($data->estatus); ?>
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

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('usuario_id_actualizacion')); ?>:</b>
	<?php echo CHtml::encode($data->usuario_id_actualizacion); ?>
	<br />

	*/ ?>

</div>