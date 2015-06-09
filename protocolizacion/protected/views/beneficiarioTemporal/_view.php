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