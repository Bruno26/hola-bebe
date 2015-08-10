
<?php
$baseUrl = Yii::app()->baseUrl;
$Validaciones = Yii::app()->getClientScript()->registerScriptFile($baseUrl . '/js/validacion.js');
?>
<?php Yii::app()->clientScript->registerScript('abogados', "
    $(document).ready(function(){
        tipo ='" . $model->tipo_abogado_id . "';
            if(tipo==101){
                $('.inpreabogado').show();         
            } else {
                $('.apoderado').show();         
            
            }
    });
    
    $('#Abogados_tipo_abogado_id').change(function(){
        if( $('#Abogados_tipo_abogado_id').val() == '101'){
            $('.inpreabogado').show();
            $('.apoderado').hide();
        } else {
            $('.inpreabogado').hide();
            $('.apoderado').show();
        }
    });
            
       

"); ?>
<?php #echo $form->errorSummary($model);                                  ?>
<div class="row">


    <?php echo $form->hiddenField($model, 'persona_id'); ?>

    <div class='col-md-4'>
        <?php
        echo $form->textFieldGroup($model, 'cedula', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 8, 'readonly' => true))));
        ?>
    </div>
    <div class='col-md-4'>
        <?php echo $form->textFieldGroup($model, 'primer_nombre', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 100, 'readonly' => true,)))); ?>
    </div>
    <div class='col-md-4'>
        <?php echo $form->textFieldGroup($model, 'segundo_nombre', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 100, 'readonly' => true,)))); ?>
    </div>


</div>
<div class="row">
    <div class='col-md-6'>
        <?php echo $form->textFieldGroup($model, 'primer_apellido', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 100, 'readonly' => true,)))); ?>
    </div>
    <div class='col-md-6'>
        <?php echo $form->textFieldGroup($model, 'segundo_apellido', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 100, 'readonly' => true,)))); ?>
    </div>
</div>


<div class="row">
    <div class="col-md-6">

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
    <div class="col-md-6">
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

<div class="row">
    <div class="col-md-4 inpreabogado" style="display: none;">
        <?php echo $form->textFieldGroup($model, 'inpreabogado', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 7)))); ?>
    </div>
    <div class="col-md-4 apoderado"  style="display: none;">
        <b>Rif Abogado </b> <span class="required">*</span>
        <?php echo $form->textFieldGroup($model, 'rif_abogado', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 20)))); ?>
    </div>
    <div class="col-md-4 apoderado"  style="display: none;">
        <b>Resgistro Público</b> <span class="required">*</span>
        <?php
        echo $form->dropDownListGroup($model, 'registro_publico_id', array('wrapperHtmlOptions' => array('class' => 'col-sm-12 limpiar'),
            'widgetOptions' => array(
                'data' => CHtml::listData(RegistroPublico::model()->findAll(), 'id_registro_publico', 'nombre_registro_publico'),
                'htmlOptions' => array('empty' => 'SELECCIONE', 'disabled' => true,),
            )
                )
        );
        ?>
    </div>
    <div class="col-md-4 apoderado"  style="display: none;">
        <b> Número de Protocolo </b> <span class="required">*</span>
        <?php
        echo $form->dropDownListGroup($model, 'nun_protocolo', array('wrapperHtmlOptions' => array('class' => 'col-sm-12 limpiar'),
            'widgetOptions' => array(
                'data' => Maestro::FindMaestrosByPadreSelect(144, 'descripcion ASC'),
                'htmlOptions' => array('empty' => 'SELECCIONE'),
            )
                )
        );
        ?>
    </div>
</div>
<div class="row">
    <div class="col-md-4 apoderado"  style="display: none;">
        <b> Folio </b> <span class="required">*</span>
        <?php echo $form->textFieldGroup($model, 'folio', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 12)))); ?>
    </div>
    <div class="col-md-4 apoderado"  style="display: none;">
        <b>Número de Tomo </b> <span class="required">*</span>
        <?php echo $form->textFieldGroup($model, 'tomo', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 3)))); ?>

    </div>
    <div class="col-md-4 apoderado"  style="display: none;">
        <b> Año </b> <span class="required">*</span>
        <?php
        echo $form->datePickerGroup($model, 'anio', array('widgetOptions' =>
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
                'htmlOptions' => array('rows' => 2, 'maxlength' => 200,
                ),
            )
                )
        );
        ?>
    </div>

</div>