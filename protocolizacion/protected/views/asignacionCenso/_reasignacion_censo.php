<?php
$baseUrl = Yii::app()->baseUrl;
$Validaciones = Yii::app()->getClientScript()->registerScriptFile($baseUrl . '/js/validacion.js');
?>
<div class="row">
    <div class="col-md-4">

        <?php
        $criteria = new CDbCriteria;
        $criteria->order = 'strdescripcion ASC';
        echo $form->dropDownListGroup($estado, 'clvcodigo', array('wrapperHtmlOptions' => array('class' => 'col-sm-4',),
            'widgetOptions' => array('data' => CHtml::listData(Tblestado::model()->findAll($criteria), 'clvcodigo', 'strdescripcion'),
                'htmlOptions' => array(
                    'empty' => 'SELECCIONE',
                    'ajax' => array(
                        'type' => 'POST', 'url' => CController::createUrl('ValidacionJs/BuscarMunicipios'),
                        'update' => '#' . CHtml::activeId($municipio, 'clvcodigo'),
                    ),
                    'disabled' => true,
                ),
            )
                )
        );
        ?>
    </div>
    <div class="col-md-4">
        <?php
        echo $form->dropDownListGroup($municipio, 'clvcodigo', array('wrapperHtmlOptions' => array('class' => 'col-sm-12',),
            'widgetOptions' => array(
                'htmlOptions' => array(
                    'ajax' => array(
                        'type' => 'POST',
                        'url' => CController::createUrl('ValidacionJs/BuscarParroquias'),
                        'update' => '#' . CHtml::activeId($parroquia, 'clvcodigo'),
                    ),
                    'empty' => 'SELECCIONE',
                    'disabled' => true,
                ),
            )
                )
        );
        ?>
    </div>
    <div class="col-md-4">

        <?php
        echo $form->dropDownListGroup($parroquia, 'clvcodigo', array('wrapperHtmlOptions' => array('class' => 'col-sm-12 limpiar',),
            'widgetOptions' => array('htmlOptions' => array(
                    'ajax' => array(
                        'type' => 'POST',
                        'url' => CController::createUrl('ValidacionJs/BuscarDesarrollo'),
                        'update' => '#' . CHtml::activeId($model, 'desarrollo_id'),
                    ),
                    'empty' => 'SELECCIONE',
                    'disabled' => true,
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
        echo $form->dropDownListGroup($model, 'desarrollo_id', array('wrapperHtmlOptions' => array('class' => 'col-sm-12 limpiar',),
            'widgetOptions' => array('htmlOptions' => array(
                    'empty' => 'SELECCIONE',
                    'disabled' => true,
                ),
            )
                )
        );
        ?>

    </div>

    <div class="col-md-4">

        <?php echo $form->labelEx($model, 'oficina_id'); ?>
        <?php
        $this->widget(
                'booster.widgets.TbSelect2', array(
            'name' => CHtml::activeId($model, 'oficina_id'),
            'attribute' => 'oficina_id',
            'data' => CHtml::listData(Oficina::model()->findAll(), 'id_oficina', 'nombre'),
            'htmlOptions' => array(
                'style' => 'width: 100%',
                'placeholder' => 'Este campo es de autocompletar',
                'multiple' => false,
                'id' => CHtml::activeId($model, 'oficina_id'),
            ),
                )
        );
        ?>
    </div>
    <div class="col-md-4">
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
    <div class="col-md-4">
        <?php echo CHtml::activeLabel($model, 'censado'); ?><br>
        <?php
        $this->widget('booster.widgets.TbSwitch', array('name' => 'censado',
            'options' => array(
                'size' => 'large',
                'onText' => 'SI',
                'offText' => 'NO',
            ),
            'htmlOptions' => array(
        )));
        ?> 
    </div>

    <?php echo $form->hiddenField($model, 'persona_id'); ?>
    <?php echo $form->hiddenField($model, 'fecha_nac'); ?>
    <?php echo $form->hiddenField($model, 'desarrollo_id'); ?>

    <div class='col-md-4'>
        <?php
        echo $form->dropDownListGroup($model, 'nacionalidad', array('wrapperHtmlOptions' => array('class' => 'col-sm-12'),
            'widgetOptions' => array(
                'data' => Maestro::FindMaestrosByPadreSelect(96, 'descripcion DESC'),
                'htmlOptions' => array('empty' => 'SELECCIONE'),
            )
                )
        );
        ?>
    </div>
    <div class='col-md-4'>
        <?php
        echo $form->textFieldGroup($model, 'cedula', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 8,
                    'onblur' => "buscarPersonaAsignacionCenso($('#AsignacionCenso_nacionalidad').val(),$(this).val())"
        ))));
        ?>
    </div>
</div>

<div class="row">
    <div class="col-md-2"  id="iconLoding" style="display: none">
        <img src="<?php echo Yii::app()->baseUrl; ?>/images/loading.gif" width="50px" height="60px">
    </div>
</div>



<div class="row">
    <div class='col-md-3'>
        <?php echo $form->textFieldGroup($model, 'primer_nombre', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 100, 'readonly' => true,)))); ?>
    </div>

    <div class='col-md-3'>
        <?php echo $form->textFieldGroup($model, 'segundo_nombre', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 100, 'readonly' => true,)))); ?>
    </div>
    <div class='col-md-3'>
        <?php echo $form->textFieldGroup($model, 'primer_apellido', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 100, 'readonly' => true,)))); ?>
    </div>
    <div class='col-md-3'>
        <?php echo $form->textFieldGroup($model, 'segundo_apellido', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 100, 'readonly' => true,)))); ?>
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



