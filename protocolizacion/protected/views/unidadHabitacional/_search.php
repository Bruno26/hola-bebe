<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldGroup($model,'id_unidad_habitacional',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

		<?php echo $form->textFieldGroup($model,'nombre',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>100)))); ?>

		<?php echo $form->textFieldGroup($model,'desarrollo_id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

		<?php echo $form->textFieldGroup($model,'gen_tipo_inmueble_id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

		<?php echo $form->textFieldGroup($model,'total_unidades',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

		<?php echo $form->textFieldGroup($model,'registro_publico_id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

		<?php echo $form->textFieldGroup($model,'tipo_documento_id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

		<?php echo $form->textFieldGroup($model,'fecha_registro',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

		<?php echo $form->textFieldGroup($model,'nro_documento',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>50)))); ?>

		<?php echo $form->textFieldGroup($model,'tomo',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>50)))); ?>

		<?php echo $form->textFieldGroup($model,'ano',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

		<?php echo $form->textFieldGroup($model,'nro_protocolo',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>50)))); ?>

		<?php echo $form->textFieldGroup($model,'asiento_registral',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>6)))); ?>

		<?php echo $form->textFieldGroup($model,'folio_real',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>6)))); ?>

		<?php echo $form->textFieldGroup($model,'nro_matricula',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>100)))); ?>

		<?php echo $form->textFieldGroup($model,'fuente_datos_entrada_id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

		<?php echo $form->textFieldGroup($model,'fecha_creacion',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

		<?php echo $form->textFieldGroup($model,'fecha_actualizacion',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

		<?php echo $form->textFieldGroup($model,'usuario_id_creacion',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

		<?php echo $form->textFieldGroup($model,'usuario_id_actualizacion',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<div class="form-actions">
		<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType' => 'submit',
			'context'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
