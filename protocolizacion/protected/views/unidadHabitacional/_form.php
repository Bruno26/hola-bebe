<p class="help-block">Los Campos con <span class="required">*</span> son obligatorios.</p>

<div class="row">
    <div class="col-md-4">

        <?php
        $criteria = new CDbCriteria;
        $criteria->order = 'strdescripcion ASC';
        echo $form->dropDownListGroup($estado, 'clvcodigo', array('wrapperHtmlOptions' => array('class' => 'col-sm-4',),
            'widgetOptions' => array(
                'data' => CHtml::listData(Tblestado::model()->findAll($criteria), 'clvcodigo', 'strdescripcion'),
                'htmlOptions' => array(
                    'empty' => 'SELECCIONE',
                    'ajax' => array(
                        'type' => 'POST',
                        'url' => CController::createUrl('ValidacionJs/BuscarMunicipios'),
                        'update' => '#' . CHtml::activeId($municipio, 'clvcodigo'),
                    ),
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
                ),
            )
                )
        );
        ?>
    </div>
    <div class="col-md-4">

        <?php
        echo $form->dropDownListGroup($parroquia, 'clvcodigo', array('wrapperHtmlOptions' => array('class' => 'col-sm-12 limpiar',),
            'widgetOptions' => array(
                'htmlOptions' => array(
                    'ajax' => array(
                        'type' => 'POST',
                        'url' => CController::createUrl('ValidacionJs/BuscarDesarrollo'),
                        'update' => '#' . CHtml::activeId($model, 'desarrollo_id'),
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
    <div class='row-fluid'>
        <div class='col-md-4'>
            <?php
            echo $form->dropDownListGroup($model, 'desarrollo_id', array('wrapperHtmlOptions' => array('class' => 'col-sm-12 limpiar'),
                'widgetOptions' => array(
                    'htmlOptions' => array('empty' => 'SELECCIONE',
                    ),
                )
                    )
            );
            ?>
        </div>
        <div class='col-md-8'>
            <?php
            echo $form->textFieldGroup($model, 'nombre', array('widgetOptions' => array('htmlOptions' => array('class' => ''))));
            ?>
        </div>
    </div>
</div>
<div class="row">
    <div class='row-fluid'>
        <div class='col-md-4'>
            <?php
            echo $form->dropDownListGroup($model, 'gen_tipo_inmueble_id', array('wrapperHtmlOptions' => array('class' => 'col-sm-12'),
                'widgetOptions' => array(
                    'data' => Maestro::FindMaestrosByPadreSelect(81, 'descripcion DESC'),
                    'htmlOptions' => array('empty' => 'SELECCIONE'),
                )
                    )
            );
            ?>
        </div>
        <div class='col-md-4'>
            <?php
            echo $form->dropDownListGroup($model, 'registro_publico_id', array('wrapperHtmlOptions' => array('class' => 'col-sm-12 limpiar'),
                'widgetOptions' => array(
                    'data' => CHtml::listData(RegistroPublico::model()->findAll(), 'id_registro_publico', 'nombre_registro_publico'),
                    'htmlOptions' => array('empty' => 'SELECCIONE'),
                )
                    )
            );
            ?>
        </div>
        <div class='col-md-4'>
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
</div>

<div class="row">
    <div class='row-fluid'>
        <div class='col-md-4'>
            <?php
            echo $form->textFieldGroup($model, 'nro_documento', array('widgetOptions' => array('htmlOptions' => array('class' => ''))));
            ?>
        </div>
        <div class='col-md-4'>
            <?php
            echo $form->textFieldGroup($model, 'tomo', array('widgetOptions' => array('htmlOptions' => array('class' => ''))));
            ?>
        </div>
        <div class='col-md-4'>
            <?php
            echo $form->dropDownListGroup($model, 'tipo_documento_id', array('wrapperHtmlOptions' => array('class' => 'col-sm-12 limpiar'),
                'widgetOptions' => array(
                    'data' => Maestro::FindMaestrosByPadreSelect(86, 'descripcion DESC'),
                    'htmlOptions' => array('empty' => 'SELECCIONE'),
                )
                    )
            );
            ?>
        </div>
    </div>
</div>
<div class="row">
    <div class='row-fluid'>
        <div class='col-md-4'>
            <?php
            echo $form->datePickerGroup($model, 'ano', array('widgetOptions' =>
                array(
                    'options' => array(
                        'language' => 'es',
                        'format' => 'yyyy',
                        'startView' => 1,
                        'minViewMode' => 2,
                        'autoclose' => true,
                        'endDate' => 'now()',
                    ),
                    'htmlOptions' => array(
                        'class' => 'span5 limpiar',
                        'readonly' => true,
                    ),
                ),
                'prepend' => '<i class="glyphicon glyphicon-calendar"></i>',
                    )
            );
            ?>
        </div>
        <div class='col-md-4'>
            <?php
            echo $form->textFieldGroup($model, 'nro_protocolo', array('widgetOptions' => array('htmlOptions' => array('class' => ''))));
            ?>
        </div>
        <div class='col-md-4'>
            <?php
            echo $form->textFieldGroup($model, 'asiento_registral', array('widgetOptions' => array('htmlOptions' => array('class' => ''))));
            ?>
        </div>

    </div>
</div>
<div class="row">
    <div class='row-fluid'>
        <div class='col-md-6'>
            <?php
            echo $form->textFieldGroup($model, 'folio_real', array('widgetOptions' => array('htmlOptions' => array('class' => ''))));
            ?>
        </div>
        <div class='col-md-6'>
            <?php
            echo $form->textFieldGroup($model, 'nro_matricula', array('widgetOptions' => array('htmlOptions' => array('class' => ''))));
            ?>
        </div>
    </div>
</div>



