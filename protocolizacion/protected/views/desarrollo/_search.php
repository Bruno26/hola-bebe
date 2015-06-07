<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldGroup($model,'id_desarrollo',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

		<?php echo $form->textFieldGroup($model,'nombre',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>200)))); ?>

		<?php echo $form->textFieldGroup($model,'parroquia_id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

		<?php echo $form->textFieldGroup($model,'descripcion',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>300)))); ?>

		<?php echo $form->textFieldGroup($model,'urban_barrio',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>200)))); ?>

		<?php echo $form->textFieldGroup($model,'av_call_esq_carr',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>200)))); ?>

		<?php echo $form->textFieldGroup($model,'zona',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>200)))); ?>

		<?php echo $form->textFieldGroup($model,'lindero_norte',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>200)))); ?>

		<?php echo $form->textFieldGroup($model,'lindero_sur',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>200)))); ?>

		<?php echo $form->textFieldGroup($model,'lindero_este',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>200)))); ?>

		<?php echo $form->textFieldGroup($model,'lindero_oeste',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>200)))); ?>

		<?php echo $form->textFieldGroup($model,'coordenadas',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>200)))); ?>

		<?php echo $form->textFieldGroup($model,'lote_terreno_mt2',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

		<?php echo $form->textFieldGroup($model,'fuente_financiamiento_id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

		<?php echo $form->textFieldGroup($model,'ente_ejecutor_id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

		<?php echo $form->checkBoxGroup($model,'titularidad_del_terreno'); ?>

		<?php echo $form->textFieldGroup($model,'total_viviendas',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

		<?php echo $form->textFieldGroup($model,'total_viviendas_protocolizadas',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

		<?php echo $form->textFieldGroup($model,'fecha_transferencia',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

		<?php echo $form->textFieldGroup($model,'fuente_datos_entrada_id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

		<?php echo $form->textFieldGroup($model,'fecha_creacion',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

		<?php echo $form->textFieldGroup($model,'fecha_actualizacion',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

		<?php echo $form->textFieldGroup($model,'usuario_id_creacion',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

		<?php echo $form->textFieldGroup($model,'usuario_id_actualizacion',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

		<?php echo $form->textFieldGroup($model,'programa_id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

		<?php echo $form->textFieldGroup($model,'total_unidades',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<div class="form-actions">
		<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType' => 'submit',
			'context'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
