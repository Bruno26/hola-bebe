

<p class="help-block">Los campos marcados con <span class="required">*</span> son requeridos.</p>


<div class="row">
    <div class="col-md-4">
        <?php
        echo $form->dropDownListGroup($model, 'tipo_vivienda_id', array('wrapperHtmlOptions' => array('class' => 'col-sm-12 limpiar'),
            'widgetOptions' => array(
                //   'data' => Maestro::FindMaestrosByPadreSelect(694, 'descripcion ASC'),
                'htmlOptions' => array('empty' => 'SELECCIONE',
                ),
            )
                )
        );
        ?>
    </div>
    <div class="col-md-4">
        <?php
        echo $form->dropDownListGroup($model, 'unidad_habitacional_id', array('wrapperHtmlOptions' => array('class' => 'col-sm-12 limpiar'),
            'widgetOptions' => array(
                //   'data' => Maestro::FindMaestrosByPadreSelect(694, 'descripcion ASC'),
                'htmlOptions' => array('empty' => 'SELECCIONE',
                ),
            )
                )
        );
        ?>
    </div>
    <div class="col-md-4">
        <?php echo $form->textFieldGroup($model, 'construccion_mt2', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 10)))); ?>

    </div>
</div>

<div class="row">
    <div class="col-md-3">

        <?php echo $form->textFieldGroup($model, 'nro_piso', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 10)))); ?>

    </div>
    <div class="col-md-3">
        <?php echo $form->textFieldGroup($model, 'nro_vivienda', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 10)))); ?>

    </div>
    <div class="col-md-3">
        <?php echo CHtml::activeLabel($model, 'sala'); ?><br>
        <?php
        $this->widget('booster.widgets.TbSwitch', array(
            'name' => 'sala',
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
    <div class="col-md-3">
        <?php echo CHtml::activeLabel($model, 'comedor'); ?><br>
        <?php
        $this->widget('booster.widgets.TbSwitch', array(
            'name' => 'comedor',
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
</div>
<div class="row">

    <div class="col-md-3">
        <?php echo CHtml::activeLabel($model, 'cocina'); ?><br>
        <?php
        $this->widget('booster.widgets.TbSwitch', array(
            'name' => 'cocina',
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
    <div class="col-md-3">
        <?php echo CHtml::activeLabel($model, 'lavandero'); ?><br>
        <?php
        $this->widget('booster.widgets.TbSwitch', array(
            'name' => 'lavandero',
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
    <div class="col-md-3">
        <?php echo $form->textFieldGroup($model, 'nro_habitaciones', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5')))); ?>

    </div>
    <div class="col-md-3">
        <?php echo $form->textFieldGroup($model, 'nro_banos', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5')))); ?>

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

    </div>
</div>
<div class="row">
    <div class="col-md-4">

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

    <div class="col-md-4">

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
    </div>

</div>
<div class="row">

    <div class="col-md-6">
        <?php echo $form->textFieldGroup($model, 'precio_vivienda', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 16)))); ?>
    </div>
    <div class="col-md-6">
        <?php
        echo $form->textAreaGroup(
                $model, 'descripcion_estac', array(
            'wrapperHtmlOptions' => array(
                'class' => 'col-sm-5',
            ),
            'widgetOptions' => array(
                'htmlOptions' => array('rows' => 1, 'maxlength' => 15,
                ),
            )
                )
        );
        ?>
    </div>

</div>

<?php // echo $form->errorSummary($model); ?>

<?php // echo $form->textFieldGroup($model, 'tipo_vivienda_id', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5')))); ?>

<?php // echo $form->textFieldGroup($model, 'unidad_habitacional_id', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5'))));  ?>





<?php //  echo $form->textFieldGroup($model, 'nro_estacionamientos', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5')))); ?>

<?php // echo $form->textFieldGroup($model, 'descripcion_estac', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 15)))); ?>



<?php //  echo $form->textFieldGroup($model, 'fuente_datos_entrada_id', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5')))); ?>

<?php // echo $form->textFieldGroup($model, 'estatus_vivienda_id', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5')))); ?>

<?php // echo $form->checkBoxGroup($model, 'cocina'); ?>

<?php // echo $form->textFieldGroup($model, 'fecha_creacion', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5')))); ?>

<?php // echo $form->textFieldGroup($model, 'fecha_actualizacion', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5')))); ?>

<?php // echo $form->textFieldGroup($model, 'usuario_id_creacion', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5')))); ?>

<?php // echo $form->textFieldGroup($model, 'usuario_id_actualizacion', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5')))); ?>

<!--<div class="form-actions">-->
<?php
//    $this->widget('booster.widgets.TbButton', array(
//        'buttonType' => 'submit',
//        'context' => 'primary',
//        'label' => $model->isNewRecord ? 'Create' : 'Save',
//    ));
?>
<!--</div>-->
