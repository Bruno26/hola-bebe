<p class="help-block">Los campos con <span class="required">*</span> son obligatorios.</p>
<?php
$baseUrl = Yii::app()->baseUrl;
$Validaciones = Yii::app()->getClientScript()->registerScriptFile($baseUrl . '/js/validacion.js');
?>
<?php #echo $form->errorSummary($model); ?>
<div class="row">
    <div class="row-fluid">

        <?php echo $form->hiddenField($model, 'persona_id'); ?>

        <div class='col-md-3'>
            <?php
            echo $form->textFieldGroup($model, 'cedula', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 8, 'readonly' => true))));
            ?>
        </div>
        <div class='col-md-3'>
            <?php echo $form->textFieldGroup($model, 'primer_nombre', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 100, 'readonly' => true,)))); ?>
        </div>


        <div class='col-md-3'>
            <?php echo $form->textFieldGroup($model, 'primer_apellido', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 100, 'readonly' => true,)))); ?>
        </div>

    </div>

</div>


<div class="row">
    <div class="row-fluid">
        <div class="col-md-4">
            <?php echo $form->textFieldGroup($model, 'inpreabogado', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 20)))); ?>
        </div>
        <div class="col-md-4">

            <?php
            echo $form->dropDownListGroup($model, 'tipo_abogado_id', array('wrapperHtmlOptions' => array('class' => 'col-sm-12 limpiar'),
                'widgetOptions' => array(
                    'data' => Maestro::FindMaestrosByPadreSelect(99, 'descripcion DESC'),
                    'htmlOptions' => array('empty' => 'SELECCIONE'),
                )
                    )
            );
            ?>
        </div>
        <div class="col-md-4">
            <?php
            echo $form->dropDownListGroup($model, 'oficina_id', array('wrapperHtmlOptions' => array('class' => 'col-sm-12 limpiar'),
                'widgetOptions' => array(
                    'data' => CHtml::listData(Oficina::model()->findAll(), 'id_oficina', 'nombre'),
                    'htmlOptions' => array('empty' => 'SELECCIONE'),
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
