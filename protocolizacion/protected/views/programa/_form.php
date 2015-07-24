<?php /* $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
  'id'=>'programa-form',
  'enableAjaxValidation'=>false,
  )); */ ?>

<?php // echo'<pre>';var_dump($model);die;  ?>

<div class="row">
    <div class="row-fluid">
        <div class='col-md-6'>
            <?php echo $form->textFieldGroup($model, 'nombre_programa', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 100)))); ?>
        </div>
        <div class='col-md-6'>
            <?php
            echo $form->dropDownListGroup($model, 'fuente_financiamiento_id', array('wrapperHtmlOptions' => array('class' => 'col-sm-12 limpiar'),
                'widgetOptions' => array(
                    'data' => CHtml::listData(FuenteFinanciamiento::model()->findAll(), 'id_fuente_financiamiento', 'nombre_fuente_financiamiento'),
                    'htmlOptions' => array('empty' => 'SELECCIONE',
                    ),
                )
                    )
            );
            ?>
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
