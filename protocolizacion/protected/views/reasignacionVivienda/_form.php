
<div class="row">
    <div class="row-fluid">
        <div class="col-md-4">
            <?php echo $form->textFieldGroup($model, 'desarrollo', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'readonly' => TRUE)))); ?>
        </div>
        <div class="col-md-4">
            <?php echo $form->textFieldGroup($model, 'unidad_habitacional', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'readonly' => TRUE)))); ?>
        </div>

        <div class="col-md-4">
            <?php echo $form->textFieldGroup($model, 'tipo_vivienda', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'readonly' => TRUE)))); ?>
        </div>
    </div>

    <?php echo $form->hiddenField($model, 'vivienda_id'); ?>
</div>
<div class="row">
    <div class="row-fluid">
        <div class="col-md-3">
            <?php echo $form->textFieldGroup($model, 'nro_piso', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'readonly' => TRUE)))); ?>
        </div>
        <div class="col-md-3">
            <?php echo $form->textFieldGroup($model, 'nro_vivienda', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'readonly' => TRUE)))); ?>
        </div>
        <div class="col-md-3">
            <?php
            echo $form->dropDownListGroup($model, 'tipo_reasignacion_id', array('wrapperHtmlOptions' => array('class' => 'col-sm-4'),
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

        <div class="col-md-3">

            <?php
            echo $form->datePickerGroup($model, 'fecha_reasignacion', array('widgetOptions' =>
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
</div>
<div class="row">

    <div class="row-fluid">
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
</div>






