<?php #$form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	#'id'=>'ente-ejecutor-form',
	#'enableAjaxValidation'=>false,
#$)); ?>

<p class="help-block">Los Campos con <span class="required">*</span> son obligatorios.</p>

<?php #echo $form->errorSummary($model); ?>

    <div class="row">
        <div class="row-fluid">

            <div class='col-md-6'>
                <?php echo $form->textFieldGroup($model,'nombre_ente_ejecutor',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>200)))); ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="row-fluid">
            <div class='col-md-12'>
            <?php
                echo $form->textAreaGroup(
                        $model, 'observaciones', array(
                    'wrapperHtmlOptions' => array(
                        'class' => 'col-sm-5',
                    ),
                    'widgetOptions' => array(
                        'htmlOptions' => array('rows' => 2, 'maxlength' => 200,
                        ),
                    )
                        )
                );
            ?>
        </div>
    </div>
</div>
    

    
<div class="form-actions">
	<?php /*$this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); */?>
</div>

<?php #$this->endWidget(); ?>
