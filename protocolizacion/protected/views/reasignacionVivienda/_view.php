<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_reasignacion_vivienda')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_reasignacion_vivienda),array('view','id'=>$data->id_reasignacion_vivienda)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('beneficiario_id_anterior')); ?>:</b>
	<?php echo CHtml::encode($data->beneficiario_id_anterior); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('beneficiario_id_actual')); ?>:</b>
	<?php echo CHtml::encode($data->beneficiario_id_actual); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vivienda_id')); ?>:</b>
	<?php echo CHtml::encode($data->vivienda_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_reasignacion_id')); ?>:</b>
	<?php echo CHtml::encode($data->tipo_reasignacion_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('persona_id_autoriza')); ?>:</b>
	<?php echo CHtml::encode($data->persona_id_autoriza); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('observaciones')); ?>:</b>
	<?php echo CHtml::encode($data->observaciones); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_reasignacion')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_reasignacion); ?>
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