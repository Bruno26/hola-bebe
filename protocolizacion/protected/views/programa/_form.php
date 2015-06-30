<?php /*$form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'programa-form',
	'enableAjaxValidation'=>false,
)); */ ?>


<?php // echo $form->errorSummary($model); ?>

<div class="row">
    <div class="row-fluid">
         <div class='col-md-6'>
            <?php echo $form->textFieldGroup($model,'nombre_programa',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>100)))); ?>
        </div>
    </div>
</div>



<div class="form-actions">
	<?php /* $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); */ ?>
</div>

<?php #$this->endWidget(); ?>
