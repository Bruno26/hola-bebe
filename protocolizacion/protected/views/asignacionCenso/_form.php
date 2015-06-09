
<p class="help-block">Fields with <span class="required">*</span> are required.</p>
<div class="row">
    <div class="col-md-6">

        <?php
        echo $form->dropDownListGroup($model, 'unidad_habitacional_id', array('wrapperHtmlOptions' => array('class' => 'col-sm-12 limpiar'),
            'widgetOptions' => array(
                'data' => CHtml::listData(UnidadHabitacional::model()->findAll(), 'id_unidad_habitacional', 'nombre'),
                'htmlOptions' => array('empty' => 'SELECCIONE',
                ),
            )
                )
        );
        ?>

    </div>
    <div class="col-md-6">

        <?php
        echo $form->dropDownListGroup($model, 'oficina_id', array('wrapperHtmlOptions' => array('class' => 'col-sm-12 limpiar'),
            'widgetOptions' => array(
                'data' => CHtml::listData(Oficina::model()->findAll(), 'id_oficina', 'nombre'),
                'htmlOptions' => array('empty' => 'SELECCIONE',
                ),
            )
                )
        );
        ?>

    </div>

</div>
<!--<div class="rows">-->
    <!--<div class="col-md-6">-->
        <?php // echo $form->textFieldGroup($model, 'persona_id', array('widgetOptions' => array('htmlOptions' => array('class' => '')))); ?>
    <!--</div>-->

<!--</div>-->
<div class="rows">
    <div class="col-md-6">
        <?php echo CHtml::activeLabel($model, 'censado'); ?><br>
        <?php
        $this->widget('booster.widgets.TbSwitch', array(
            'name' => 'censado',
            'options' => array(
                'size' => 'large',
                'onText' => 'SI',
                'offText' => 'NO',
            ),
            'htmlOptions' => array(
            )
                )
        );
        ?> 
    </div>
    <div class="col-md-6">
        <?php
        echo $form->datePickerGroup($model, 'fecha_asignacion', array('widgetOptions' =>
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
    <div class="col-md-12">
        <?php
        echo $form->textAreaGroup(
                $model, 'observaciones', array(
            'wrapperHtmlOptions' => array(
                'class' => 'col-sm-5',
            ),
            'widgetOptions' => array(
                'htmlOptions' => array('rows' => 1, 'maxlength' => 200,
                ),
            )
                )
        );
        ?>
    </div>
</div>



