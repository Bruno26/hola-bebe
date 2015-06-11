<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => 'datosLaborales-form',
    'enableAjaxValidation' => false,
    'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
        'validateOnChange' => true,
        'validateOnType' => true,
    ),
        ));
?>
<?php
$baseUrl = Yii::app()->baseUrl;
$Validaciones = Yii::app()->getClientScript()->registerScriptFile($baseUrl . '/js/jquery.mask.min');
$Validacion = Yii::app()->getClientScript()->registerScriptFile($baseUrl . '/js/js_jquery.numeric.js');
Yii::app()->clientScript->registerScript('telefono', "
        $(document).ready(function(){
            $('#Beneficiario_telefono_trabajo').numeric();  
    
        }),
        ");?>

<h1 class="text-center">Censo Socio Económico</h1>


<div class="row">
<div class="col-md-12">

    <?php
    /* ------------  Direccion Anterior Beneficiario --------- */
    $this->widget(
            'booster.widgets.TbPanel', array(
        'title' => 'Dirección Anterior del Beneficiario',
        'context' => 'primary',
        'headerIcon' => 'globe',
        'content' => $this->renderPartial('_direccionAnterior', array('form' => $form, 'model' => $model, 'municipio' => $municipio, 'estado' => $estado, 'parroquia' => $parroquia,), TRUE),
            )
    );
    ?>
</div>
<div class="col-md-12">
    <?php
    /* ------------  Direccion Anterior Beneficiario --------- */
    $this->widget(
            'booster.widgets.TbPanel', array(
        'title' => 'Datos Laborales',
        'context' => 'primary',
        'headerIcon' => 'briefcase',
        'content' => $this->renderPartial('_datosLaborales', array('form' => $form, 'model' => $model, 'municipio' => $municipio, 'estado' => $estado, 'parroquia' => $parroquia,), TRUE),
            )
    );
    ?>
</div>
</div>


<div class="well">
    <div class="pull-center" style="text-align: right;">
        <?php
        $this->widget('booster.widgets.TbButton', array(
            'buttonType' => 'submit',
            'icon' => 'glyphicon glyphicon-floppy-saved',
            'size' => 'large',
            'id' => 'guardar',
            'context' => 'primary',
            'label' => $model->isNewRecord ? 'Guardar' : 'Save',
        ));
        ?>
    </div>
</div>




<?php $this->endWidget(); ?>
