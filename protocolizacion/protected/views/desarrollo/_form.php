
<p class="help-block">Los campos marcados con <span class="required">*</span> son requeridos.</p>
<div class="row">
    <div class="col-md-3">
        <?php echo $form->textFieldGroup($model, 'nombre', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 200)))); ?>
    </div>

    <div class="col-md-3">

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
                // 'title' => 'Por favor, Seleccione el estado de procedencia',
                // 'data-toggle' => 'tooltip', 'data-placement' => 'right',
                ),
            )
                )
        );
        ?>
    </div>
    <div class="col-md-3">
        <?php
        echo $form->dropDownListGroup($municipio, 'clvcodigo', array('wrapperHtmlOptions' => array('class' => 'col-sm-12',),
            'widgetOptions' => array(
                'htmlOptions' => array(
                    'ajax' => array(
                        'type' => 'POST',
                        'url' => CController::createUrl('ValidacionJs/BuscarParroquias'),
                        'update' => '#' . CHtml::activeId($model, 'parroquia_id'),
                    ),
                    'empty' => 'SELECCIONE',
                // 'title' => 'Por favor, Seleccione su municipio de procedencia',
                //'data-toggle' => 'tooltip', 'data-placement' => 'right',
                ),
            )
                )
        );
        ?>
    </div>
    <div class="col-md-3">

        <?php
        echo $form->dropDownListGroup($model, 'parroquia_id', array('wrapperHtmlOptions' => array('class' => 'col-sm-12 limpiar',),
            'widgetOptions' => array(
                'htmlOptions' => array(
                    'empty' => 'SELECCIONE',
                // 'title' => 'Por favor, Seleccione su parroquia ',
                //'data-toggle' => 'tooltip', 'data-placement' => 'right',
                ),
            )
                )
        );
        ?>
    </div>

</div>

<div class="row">
    <div class="col-md-3">
        <?php echo $form->textFieldGroup($model, 'descripcion', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 300)))); ?>
    </div>
    <div class="col-md-3">
        <?php echo $form->textFieldGroup($model, 'urban_barrio', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 200)))); ?>
    </div>
    <div class="col-md-3">
        <?php echo $form->textFieldGroup($model, 'av_call_esq_carr', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 200)))); ?>
    </div>

    <div class="col-md-3">
        <?php
        echo $form->textAreaGroup(
                $model, 'zona', array(
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
        <?php // echo $form->textFieldGroup($model, 'zona', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 200)))); ?>
    </div>


</div>

<div class="row">
    <div class="col-md-6">
        <?php
        echo $form->textAreaGroup(
                $model, 'lindero_norte', array(
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
        <?php //echo $form->textFieldGroup($model, 'lindero_norte', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 200)))); ?>
    </div>
    <div class="col-md-6">

        <?php
        echo $form->textAreaGroup(
                $model, 'lindero_sur', array(
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
        <?php //echo $form->textFieldGroup($model, 'lindero_sur', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 200))));  ?>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <?php //echo $form->textFieldGroup($model, 'lindero_este', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 200)))); ?>
        <?php
        echo $form->textAreaGroup(
                $model, 'lindero_este', array(
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

    <div class="col-md-6">

        <?php //echo $form->textFieldGroup($model, 'lindero_oeste', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 200)))); ?>
        <?php
        echo $form->textAreaGroup(
                $model, 'lindero_oeste', array(
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


<div class="row">
    <div class="col-md-4">
        <?php
        echo $form->textAreaGroup(
                $model, 'coordenadas', array(
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
        <?php //echo $form->textFieldGroup($model, 'coordenadas', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 200))));  ?>
    </div>
    <div class="col-md-4">
        <?php echo $form->textFieldGroup($model, 'lote_terreno_mt2', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5')))); ?>
    </div>
    <div class="col-md-4" >
        <?php
//        echo $form->dropDownListGroup($model, 'fuente_financiamiento_id', array('wrapperHtmlOptions' => array('class' => 'col-sm-12 limpiar'),
//            'widgetOptions' => array(
//                //   'data' => Maestro::FindMaestrosByPadreSelect(694, 'descripcion ASC'),
//                'data' => array(1,2,3),
//                'htmlOptions' => array('empty' => 'SELECCIONE',
//                ),
//            )
//                )
//        );
        ?>
    </div>
</div>

<div class="row">
    <div class="col-md-4" >
        <?php echo CHtml::activeLabel($model, 'titularidad_del_terreno'); ?><br>
        <?php
        $this->widget('booster.widgets.TbSwitch', array(
            'name' => 'titularidad_del_terreno',
            'options' => array(
                'size' => 'large',
                'onText' => 'SI',
                'offText' => 'NO',
            ),
            'htmlOptions' => array(
            // 'class' => '',
            // 'onChange' => '',
            )
                )
        );
        ?> 
    </div>
    <div class="col-md-4" >
         <?php
            echo $form->datePickerGroup($model, 'fecha_transferencia', array('widgetOptions' =>
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
    <div class="col-md-4" >
        <?php
//        echo $form->dropDownListGroup($model, 'ente_ejecutor_id', array('wrapperHtmlOptions' => array('class' => 'col-sm-12 limpiar'),
//            'widgetOptions' => array(
//                //   'data' => Maestro::FindMaestrosByPadreSelect(694, 'descripcion ASC'),
//                'data' => array(1,2,3),
//                'htmlOptions' => array('empty' => 'SELECCIONE',
//                ),
//            )
//                )
//        );
        ?>
    </div>
</div>



<?php // echo $form->errorSummary($model);  ?>











<?php //echo $form->textFieldGroup($model, 'fuente_financiamiento_id', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5'))));  ?>

<?php //echo $form->textFieldGroup($model, 'ente_ejecutor_id', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5'))));  ?>

<?php //echo $form->checkBoxGroup($model, 'titularidad_del_terreno');  ?>

<?php //echo $form->textFieldGroup($model, 'total_viviendas', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5'))));  ?>

<?php //echo $form->textFieldGroup($model, 'total_viviendas_protocolizadas', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5'))));  ?>

<?php //echo $form->textFieldGroup($model, 'fecha_transferencia', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5'))));  ?>

<?php //echo $form->textFieldGroup($model, 'fuente_datos_entrada_id', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5'))));  ?>

<?php //echo $form->textFieldGroup($model, 'fecha_creacion', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5'))));  ?>

<?php //echo $form->textFieldGroup($model, 'fecha_actualizacion', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5'))));  ?>

<?php //echo $form->textFieldGroup($model, 'usuario_id_creacion', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5'))));  ?>

<?php //echo $form->textFieldGroup($model, 'usuario_id_actualizacion', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5'))));  ?>

<?php //echo $form->textFieldGroup($model, 'programa_id', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5'))));  ?>

<?php //echo $form->textFieldGroup($model, 'total_unidades', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5')))); ?>

<div class="form-actions">
    <?php
    //$this->widget('booster.widgets.TbButton', array(
    //   'buttonType' => 'submit',
    //   'context' => 'primary',
    //  'label' => $model->isNewRecord ? 'Create' : 'Save',
    // ));
    ?>
</div>