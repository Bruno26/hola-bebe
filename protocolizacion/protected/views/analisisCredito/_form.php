<?php echo $form->hiddenField($model, 'vivienda_id'); ?>
<div class='row'>
    <div class='col-md-4'>
        <?php echo $form->textFieldGroup($model, 'monto_inicial', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5')))); ?>
    </div>
    <div class='col-md-4'>
        <?php echo $form->textFieldGroup($model, 'sub_directo_habitacional', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5')))); ?>
    </div>
    <div class='col-md-4'>
        <?php echo $form->textFieldGroup($model, 'sub_vivienda_perdida', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5')))); ?>
    </div>
</div>
<div class='row'>
    <div class='col-md-4'>
        <?php echo $form->textFieldGroup($model, 'ultimo_sueldo', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5')))); ?>
    </div>
    <div class='col-md-4'>
        <?php echo $form->textFieldGroup($model, 'plazo_credito_ano', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5')))); ?>
    </div>
    <div class='col-md-4'>
        <?php echo $form->textFieldGroup($model, 'tasa_interes_id', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5')))); ?>
    </div>
</div>
<div class='row'>
    <div class='col-md-4'>
        <?php
        echo $form->datePickerGroup($model, 'fecha_protocolizacion', array('widgetOptions' =>
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
                /* 'class' => 'span5 limpiar', */
                ),
            ),
            'prepend' => '<i class="glyphicon glyphicon-calendar"></i>',
            'beforeShowDay' => 'DisableDays',
                )
        );
        ?>
    </div>
</div>