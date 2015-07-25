<?php echo $form->hiddenField($model, 'beneficiario_id_actual'); ?>
<div class="row">
    <div class="row-fluid">
        <div class="col-md-6">
            <?php
            echo $form->dropDownListGroup($model, 'nacionalidadActual', array('wrapperHtmlOptions' => array('class' => 'col-sm-4',),
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
            <?php
            echo $form->textFieldGroup($model, 'cedulaActual', array(
                'widgetOptions' => array(
                    'htmlOptions' => array(
                        'class' => 'span5',
                        'onblur' => "buscarBenefAnterior($('#ReasignacionVivienda_nacionalidadActual').val(), $(this).val(),2)"
                    )
                )
                    )
            );
            ?>
        </div>
    </div>
</div>

<div class="row">
    <div class="row-fluid">
        <div class="col-md-12">
            <?php echo $form->textFieldGroup($model, 'nombreCompletoActual', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'readonly' => true)))); ?>
        </div>
    </div>
</div>