<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_programa')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_programa),array('view','id'=>$data->id_programa)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_programa')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_programa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_creacion')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_creacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_actualizacion')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_actualizacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estatus')); ?>:</b>
	<?php echo CHtml::encode($data->estatus); ?>
	<br />

</div>