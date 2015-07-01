<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_carga_masiva')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_carga_masiva),array('view','id'=>$data->id_carga_masiva)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_archivo')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_archivo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('num_lineas')); ?>:</b>
	<?php echo CHtml::encode($data->num_lineas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tamano_archivo')); ?>:</b>
	<?php echo CHtml::encode($data->tamano_archivo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mensajes_carga')); ?>:</b>
	<?php echo CHtml::encode($data->mensajes_carga); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('observaciones')); ?>:</b>
	<?php echo CHtml::encode($data->observaciones); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estatus')); ?>:</b>
	<?php echo CHtml::encode($data->estatus); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_carga_masiva')); ?>:</b>
	<?php echo CHtml::encode($data->tipo_carga_masiva); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_inicio')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_inicio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_fin')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_fin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usuario_id_creacion')); ?>:</b>
	<?php echo CHtml::encode($data->usuario_id_creacion); ?>
	<br />

	*/ ?>

</div>