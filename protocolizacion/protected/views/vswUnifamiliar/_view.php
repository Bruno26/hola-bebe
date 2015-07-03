<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_vivienda')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_vivienda),array('view','id'=>$data->id_vivienda)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nro_vivienda')); ?>:</b>
	<?php echo CHtml::encode($data->nro_vivienda); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_vivienda_id')); ?>:</b>
	<?php echo CHtml::encode($data->tipo_vivienda_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_vivienda')); ?>:</b>
	<?php echo CHtml::encode($data->tipo_vivienda); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_unidad_habitacional')); ?>:</b>
	<?php echo CHtml::encode($data->id_unidad_habitacional); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_unidad_habitacional')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_unidad_habitacional); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_desarrollo')); ?>:</b>
	<?php echo CHtml::encode($data->id_desarrollo); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_desarrollo')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_desarrollo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cod_estado')); ?>:</b>
	<?php echo CHtml::encode($data->cod_estado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado')); ?>:</b>
	<?php echo CHtml::encode($data->estado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estatus_vivienda_id')); ?>:</b>
	<?php echo CHtml::encode($data->estatus_vivienda_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estatus')); ?>:</b>
	<?php echo CHtml::encode($data->estatus); ?>
	<br />

	*/ ?>

</div>