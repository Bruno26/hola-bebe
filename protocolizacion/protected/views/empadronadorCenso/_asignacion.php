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
        <?php
        echo $form->dropDownListGroup($model, 'UnidadMultifamiliar', array('wrapperHtmlOptions' => array('class' => 'col-sm-12'),
            'widgetOptions' => array(
                'data' => CHtml::listData(UnidadHabitacional::model()->findAll($unidadHab), 'id_unidad_habitacional', 'nombre'),
                'htmlOptions' => array(
                    'ajax' => array(
                        'type' => 'POST',
                        'url' => CController::createUrl('ValidacionJs/BuscarParroquias'),
                        'update' => '#' . CHtml::activeId($model, 'BeneficiarioAdju'),
                    ),
                    'empty' => 'SELECCIONE',
                ),
            )
                )
        );
        ?>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <?php
        echo $form->dropDownListGroup($model, 'BeneficiarioAdju', array('wrapperHtmlOptions' => array('class' => 'col-sm-12'),
            'widgetOptions' => array(
                'htmlOptions' => array('empty' => 'SELECCIONE'),
            )
                )
        );
        ?>
    </div>
    <div class="col-md-4">
        <?php
        echo $form->dropDownListGroup($model, 'empadronador_usuario_id', array('wrapperHtmlOptions' => array('class' => 'col-sm-12'),
            'widgetOptions' => array(
                'data' => CHtml::listData(UnidadHabitacional::model()->findAll($unidadHab), 'id_unidad_habitacional', 'nombre'),
                'htmlOptions' => array('empty' => 'SELECCIONE'),
            )
                )
        );
        ?>
    </div>
</div>