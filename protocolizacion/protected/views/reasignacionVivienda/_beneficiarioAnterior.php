<?php echo $form->hiddenField($model, 'beneficiario_id_anterior'); ?>
<?php
$baseUrl = Yii::app()->baseUrl;
$numeros = Yii::app()->getClientScript()->registerScriptFile($baseUrl . '/js/js_jquery.numeric.js');
$mascara = Yii::app()->getClientScript()->registerScriptFile($baseUrl . '/js/jquery.mask.min.js');?>

<?php Yii::app()->clientScript->registerScript('beneficiarioAnterior', "
    $(document).ready(function(){
         $('#s2id_autogen1').numeric();
         $('#s2id_autogen2').numeric();
    }); ")
 ?>       
<div class="row">
    <div class="row-fluid">
        <div class="col-md-6">
            <?php
            echo $form->dropDownListGroup($model, 'nacionalidadAnterior', array('wrapperHtmlOptions' => array('class' => 'col-sm-4'),
                'widgetOptions' => array(
                    'data' => Maestro::FindMaestrosByPadreSelect(96),
                    'htmlOptions' => array(
                        'empty' => 'SELECCIONE',
                        'disabled' => TRUE,
                    ),
                )
                    )
            );
            ?>
        </div>
        <div class="col-md-6">
            <?php echo $form->textFieldGroup($model, 'cedulaAnterior', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5',  'readonly' => true )))); ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="row-fluid">
        <div class="col-md-12">
            <?php echo $form->textFieldGroup($model, 'nombreCompletoAnterior', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'readonly' => true)))); ?>
        </div>
    </div>
</div>

