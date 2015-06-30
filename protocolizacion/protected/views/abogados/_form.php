<?php
$baseUrl = Yii::app()->baseUrl;
$Validaciones = Yii::app()->getClientScript()->registerScriptFile($baseUrl . '/js/validacion.js');
?>
<?php Yii::app()->clientScript->registerScript('abogados', "
    
            $('#Abogados_tipo_abogado_id').change(function(){
                if( $(this).val() == '101'){
                    $('.inpreabogado').show();
               
                } else {
                    $('.inpreabogado').hide();
                }
            }), 
       

"); ?>
<div class="row">

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

    <div class="col-md-4 inpreabogado" style ="display: none">
        <?php echo $form->textFieldGroup($model, 'inpreabogado', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 20)))); ?>
    </div>

</div>

<div class="row">

    <?php echo $form->hiddenField($model, 'persona_id'); ?>
    <?php echo $form->hiddenField($model, 'fecha_nac'); ?>

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
                    'onblur' => "buscarPersonaAbogado($('#Abogados_nacionalidad').val(),$(this).val())"
        ))));
        ?>
    </div>
    <div class="col-md-4"  id="iconLoding" style="display: none">
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
    <div class="col-md-6">

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

    <div class="col-md-6">
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
