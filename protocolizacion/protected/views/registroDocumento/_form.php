<?php
#$form=$this->beginWidget('booster.widgets.TbActiveForm',array(
#	'id'=>'registro-documento-form',
#	'enableAjaxValidation'=>false,
#)); 
?>

<?php #echo $form->errorSummary($model);  ?>

<div class="row">


    <div class='col-md-6'>
        <?php echo $form->textFieldGroup($model, 'analisis_credito_id', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5')))); ?>
    </div>
    <div class='col-md-6'>
        <?php echo $form->textFieldGroup($model, 'registro_publico_id', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5')))); ?>
    </div>
</div>

<div class="row">
    <div class='col-md-6'>
        <?php echo $form->textFieldGroup($model, 'nro_registro', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 50)))); ?>
    </div>
    
        <?php #echo $form->textFieldGroup($model, 'fecha_registro', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 50)))); ?>
<div class="col-md-4 fecha">
        <?php
        echo $form->datePickerGroup($model, 'fecha_registro', array('widgetOptions' =>
            array(
                'options' => array(
                    'language' => 'es',
                    'format' => 'dd/mm/yyyy',
                    'startView' => 0,
                    'minViewMode' => 0,
                    'todayBtn' => 'linked',
                    'weekStart' => 0,
                    'endDate' => 'now()',
                    'autoclose' => true,
                ),
                'htmlOptions' => array(
                    'class' => 'span5 limpiar',
                    'readonly' => true,
                ),
            ),
            'prepend' => '<i class="glyphicon glyphicon-calendar"></i>',
            'beforeShowDay' => 'DisableDays',
                )
        );
        ?>
    </div>
</div>
<div class="row">
    <div class='col-md-6'>
        <?php echo $form->textFieldGroup($model, 'tomo', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 50)))); ?>
    </div>
</div>
<div class="row">
    <div class='col-md-6'>
        <?php echo $form->textFieldGroup($model, 'ano', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5')))); ?>
    </div>
    <div class='col-md-6'>
        <?php echo $form->textFieldGroup($model, 'nro_protocolo', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 50)))); ?>
    </div>
</div>
<div class="row">
    <div class='col-md-6'>
        <?php echo $form->textFieldGroup($model, 'nro_matricula', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 100)))); ?>
    </div>
</div>

<div class="form-actions">
    <?php /* $this->widget('booster.widgets.TbButton', array(
      'buttonType'=>'submit',
      'context'=>'primary',
      'label'=>$model->isNewRecord ? 'Create' : 'Save',
      )); */ ?>
</div>

<?php #$this->endWidget();  ?>
