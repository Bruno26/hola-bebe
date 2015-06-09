<?php echo $form->hiddenField($model,'beneficiario_id_anterior'); ?>

<div class="row">
    <div class="row-fluid">
        <div class="col-md-6">
            <?php
            echo $form->dropDownListGroup($model, 'nacionalidadAnterior', array('wrapperHtmlOptions' => array('class' => 'col-sm-4'),
                'widgetOptions' => array(
                    'data' => Maestro::FindMaestrosByPadreSelect(96),
                    'htmlOptions' => array(
                        'empty' => 'SELECCIONE',
                    ),
                )
                    )
            );
            ?>
        </div>
        <div class="col-md-6">
            <?php echo $form->textFieldGroup($model, 'cedulaAnterior', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'onblur' => "buscarBenefAnterior($('#ReasignacionVivienda_nacionalidadAnterior').val(), $(this).val())")))); ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="row-fluid">
        <div class="col-md-6">
            <?php echo $form->textFieldGroup($model, 'nombreAnterior', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'readonly' => true)))); ?>
        </div>
        <div class="col-md-6">
            <?php echo $form->textFieldGroup($model, 'apellidoAnterior', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'readonly' => true)))); ?>
        </div>
    </div>
</div>

