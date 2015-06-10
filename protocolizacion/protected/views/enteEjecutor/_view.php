<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_ente_ejecutor')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_ente_ejecutor),array('view','id'=>$data->id_ente_ejecutor)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_ente_ejecutor')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_ente_ejecutor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('observaciones')); ?>:</b>
	<?php echo CHtml::encode($data->observaciones); ?>
	<br />


</div>