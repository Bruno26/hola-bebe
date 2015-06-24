<?php Yii::app()->clientScript->registerScript('desarrolloVal', "
    $('#EmpadronadorCenso_UnidadMultifamiliar').change(function(){
        $('#EmpadronadorCenso_UnidadMultifamiliar').select2('val', '');
    });
"); ?>
<div class="row">
    <div class="col-md-4">
        <?php echo $form->textFieldGroup($model, 'edoDes', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 100, 'readonly' => true,)))); ?>
    </div>
    <div class="col-md-4">
        <?php echo $form->textFieldGroup($model, 'munDes', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 100, 'readonly' => true,)))); ?>
    </div>
    <div class="col-md-4">
        <?php echo $form->textFieldGroup($model, 'parqDes', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 100, 'readonly' => true,)))); ?>
    </div>
</div>
<div class="row">
    <div class="col-md-8">
        <?php echo $form->textFieldGroup($model, 'Des', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 100, 'readonly' => true,)))); ?>
    </div>
    <div class="col-md-4">
        <?php echo $form->labelEx($model, 'UnidadMultifamiliar'); ?>
        <?php
        $this->widget(
                'booster.widgets.TbSelect2', array(
            'name' => CHtml::activeId($model, 'UnidadMultifamiliar'),
            'attribute' => 'UnidadMultifamiliar',
            'data' => CHtml::listData(UnidadHabitacional::model()->findAll($unidadHab), 'id_unidad_habitacional', 'nombre'),
            'htmlOptions' => array(
                'style' => 'width: 100%',
                'placeholder' => 'Este campo es de autocompletar',
                'multiple' => false,
                'id' => CHtml::activeId($model, 'UnidadMultifamiliar'),
            ),
                )
        );
        ?>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <?php echo $form->labelEx($model, 'BeneficiarioAdju'); ?>
        <?php
        $this->widget(
                'booster.widgets.TbSelect2', array(
            'name' => CHtml::activeId($model, 'BeneficiarioAdju'),
            'attribute' => 'BeneficiarioAdju',
            //'data' => CHtml::listData(Desarrollo::model()->findAll(), 'id_desarrollo', 'nombre'),
            'htmlOptions' => array(
                'style' => 'width: 100%',
                'placeholder' => 'Este campo es de autocompletar',
                'multiple' => false,
//                'id' => CHtml::activeId($model, 'desarrollo_id'),
            ),
                )
        );
        ?>
    </div>
    <div class="col-md-4">
        <?php echo $form->textFieldGroup($model, 'empadronador_usuario_id', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5')))); ?>
    </div>
</div>