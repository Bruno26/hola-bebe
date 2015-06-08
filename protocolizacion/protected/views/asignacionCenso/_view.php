<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_asignacion_censo')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_asignacion_censo),array('view','id'=>$data->id_asignacion_censo)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('unidad_habitacional_id')); ?>:</b>
	<?php echo CHtml::encode($data->unidad_habitacional_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('oficina_id')); ?>:</b>
	<?php echo CHtml::encode($data->oficina_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('persona_id')); ?>:</b>
	<?php echo CHtml::encode($data->persona_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_asignacion')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_asignacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('censado')); ?>:</b>
	<?php echo CHtml::encode($data->censado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estatus')); ?>:</b>
	<?php echo CHtml::encode($data->estatus); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('observaciones')); ?>:</b>
	<?php echo CHtml::encode($data->observaciones); ?>
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

	*/ ?>

</div>