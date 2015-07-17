<?php
$baseUrl = Yii::app()->baseUrl;
$Validaciones = Yii::app()->getClientScript()->registerScriptFile($baseUrl . '/js/js_jquery.numeric.js');
$Validaciones = Yii::app()->getClientScript()->registerScriptFile($baseUrl . '/js/validacion.js');
Yii::app()->clientScript->registerScript('grupoFamiliar', "
    $(document).ready(function(){
        $('.numeric').numeric();   
    }),
");
?>
<p class="help-block">Los campos marcados con <span class="required">*</span> son requeridos.</p>
<?php // echo $form->errorSummary($model); ?>
<div class="row">
    <?php echo $form->hiddenField($model, 'persona_id'); ?>
    <?php echo $form->hiddenField($model, 'fecha_nacimiento'); ?>
    <div class='col-md-2'>
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
    <div class='col-md-2'>
        <?php
        echo $form->textFieldGroup($model, 'cedula', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5 numeric', 'maxlength' => 8,
                    'onblur' => "buscarPersonaFamiliar($('#GrupoFamiliar_nacionalidad').val(),$(this).val())"
        ))));
        ?>
    </div>
    <div class="col-md-2"  id="iconLoding" style="display: none">
        <img src="<?php echo Yii::app()->baseUrl; ?>/images/loading.gif" width="50px" height="60px">
    </div>
    <div class='col-md-6'>
        <?php
         echo $form->dropDownListGroup($model, 'tipo_persona_faov', array('wrapperHtmlOptions' => array('class' => 'col-sm-12 limpiar'),
            'widgetOptions' => array(
                'data' => Maestro::FindMaestrosByPadreSelect(234, 'descripcion ASC'),
                'htmlOptions' => array('empty' => 'SELECCIONE',
                ),
            )
                )
        );
        ?>
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
    <div class="col-md-4">
        <?php
        echo $form->dropDownListGroup($model, 'gen_parentesco_id', array('wrapperHtmlOptions' => array('class' => 'col-sm-12'),
            'widgetOptions' => array(
                'data' => Maestro::FindMaestrosByPadreSelect(149, 'descripcion ASC'),
                'htmlOptions' => array('empty' => 'SELECCIONE'),
            )
                )
        );
        ?>
    </div>
    <div class="col-md-4">
        <?php
         echo $form->dropDownListGroup($model, 'tipo_sujeto_atencion', array('wrapperHtmlOptions' => array('class' => 'col-sm-12 limpiar'),
            'widgetOptions' => array(
                'data' => Maestro::FindMaestrosByPadreSelect(228, 'descripcion ASC'),
                'htmlOptions' => array('empty' => 'SELECCIONE',
                ),
            )
                )
        );
        ?>
    </div>
    <div class="col-md-2">
        <?php echo $form->textFieldGroup($model, 'ingreso_mensual', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 16)))); ?>
    </div>
    <div class="col-md-2">
        <?php echo $form->textFieldGroup($model, 'ingreso_mensual_faov', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 16, 'readonly' => 'readonly')))); ?>

    </div>
</div>
<div style="margin-bottom: 1%"></div>
<div class="row">
    <div class="pull-center text-right col-md-6">
        <?php
        $this->widget('booster.widgets.TbButton', array(
            'buttonType' => 'button',
            'icon' => 'glyphicon glyphicon-log-in',
            'context' => 'success',
            'label' => 'Siguiente',
            'htmlOptions' => array(
                'onclick' => 'document.location.href ="' . $this->createUrl('grupoFamiliar/create/', array('id' => $_GET['id'], 'caso' => 1)) . '";'
            )
        ));
        ?>
    </div>
    <div class="pull-center text-left col-md-6">
        <?php
        $this->widget('booster.widgets.TbButton', array(
            'buttonType' => 'button',
            'icon' => 'glyphicon glyphicon-plus',
            'id' => 'GuardarFamiliar',
            'context' => 'primary',
            'label' => 'Agregar Familiar',
        ));
        ?>
    </div>
</div>