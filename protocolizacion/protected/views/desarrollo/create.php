<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => 'desarrollo-form',
    'enableAjaxValidation' => false,
    'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
        'validateOnChange' => true,
        'validateOnType' => true,
    ),
        ));
?>
<?php Yii::app()->clientScript->registerScript('desarrollo', "
         $('#guardar').click(function(){
                if($('#Desarrollo_nombre').val()==''){
                    bootox.alert('Por favor indique el nombre del Desarrollo');
                    return false;
                }
         
                if($('#Tblestado_clvcodigo').val()==''){
                    bootox.alert('Por favor seleccione Estado');
                    return false;
                }
                if($('#Tblmunicipio_clvcodigo').val()==''){
                    bootox.alert('Por favor seleccione Municipio');
                    return false;
                }
                if($('#Desarrollo_parroquia_id').val()==''){
                    bootox.alert('Por favor seleccione Parroquia');
                    return false;
                }
                
                });
         
         
        
        ") ?>

<h1>Desarrollo</h1>

<div class="row">
    <div class="col-md-12">
        <?php
        $this->widget(
                'booster.widgets.TbPanel', array(
            'title' => 'Caracteristica del Desarrollo Habitacional',
            'context' => 'danger',
            // 'headerHtmlOptions' => array('style' => 'background:url(' . Yii::app()->request->baseUrl . '/img/fondo_barra.jpg);color:white;'),
            'headerIcon' => 'globe',
            'content' => $this->renderPartial('_form', array('form' => $form, 'model' => $model, 'estado' => $estado, 'municipio' => $municipio, 'parroquia' => $parroquia), TRUE),
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

<?php //echo $this->renderPartial('_form', array('model'=>$model)); ?>

<?php $this->endWidget(); ?>