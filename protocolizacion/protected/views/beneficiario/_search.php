<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldGroup($model,'id_beneficiario',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

		<?php echo $form->textFieldGroup($model,'persona_id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

		<?php echo $form->textFieldGroup($model,'rif',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>10)))); ?>

		<?php echo $form->textFieldGroup($model,'condicion_trabajo_id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

		<?php echo $form->textFieldGroup($model,'fuente_ingreso_id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

		<?php echo $form->textFieldGroup($model,'relacion_trabajo_id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

		<?php echo $form->textFieldGroup($model,'sector_trabajo_id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

		<?php echo $form->textFieldGroup($model,'nombre_empresa',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>200)))); ?>

		<?php echo $form->textFieldGroup($model,'direccion_empresa',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>200)))); ?>

		<?php echo $form->textFieldGroup($model,'telefono_trabajo',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>7)))); ?>

		<?php echo $form->textFieldGroup($model,'gen_cargo_id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

		<?php echo $form->textFieldGroup($model,'ingreso_mensual',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

		<?php echo $form->textFieldGroup($model,'ingreso_declarado',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

		<?php echo $form->textFieldGroup($model,'ingreso_promedio_faov',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

		<?php echo $form->checkBoxGroup($model,'cotiza_faov'); ?>

		<?php echo $form->textFieldGroup($model,'direccion_anterior',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>200)))); ?>

		<?php echo $form->textFieldGroup($model,'geo_estado_id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

		<?php echo $form->textFieldGroup($model,'geo_municipio_id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

		<?php echo $form->textFieldGroup($model,'geo_parroquia_id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

		<?php echo $form->textFieldGroup($model,'urban_barrio',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>200)))); ?>

		<?php echo $form->textFieldGroup($model,'av_call_esq_carr',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>200)))); ?>

		<?php echo $form->textFieldGroup($model,'zona',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>200)))); ?>

		<?php echo $form->textFieldGroup($model,'fecha_ultimo_censo',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

		<?php echo $form->checkBoxGroup($model,'protocolizado'); ?>

		<?php echo $form->textFieldGroup($model,'fecha_creacion',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

		<?php echo $form->textFieldGroup($model,'fecha_actualizacion',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

		<?php echo $form->textFieldGroup($model,'usuario_id_creacion',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

		<?php echo $form->textFieldGroup($model,'usuario_id_actualizacion',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

		<?php echo $form->textFieldGroup($model,'estatus_beneficiario_id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

		<?php echo $form->textFieldGroup($model,'codigo_trab',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>4)))); ?>

	<div class="form-actions">
		<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType' => 'submit',
			'context'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
