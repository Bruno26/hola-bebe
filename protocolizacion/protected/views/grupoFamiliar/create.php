<?php
Yii::app()->clientScript->registerScript('camara', "
    
    $('#GuardarFamiliar').click(function(){
    
        var cedula = $('#Visitantes_cedula').val();
         $.ajax({
            url: '" . Yii::app()->createAbsoluteUrl('GrupoFamiliar/InsertFamiliar') . "',
            async: true,
            type: 'POST',
            data: 'cedula=' + cedula ,
            dataType: 'json',
            success: function(data) {
                
            },
            error: function(data) {
                bootbox.alert('Ocurrio un error');
            }
        });

    });
");

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
<h1>Grupo Familiar</h1>
<div class="row">
    <div class="col-md-12">
        <?php
        $this->widget(
                'booster.widgets.TbPanel', array(
            'title' => 'Grupo Familiar',
            'context' => 'primary',
            // 'headerHtmlOptions' => array('style' => 'background:url(' . Yii::app()->request->baseUrl . '/img/fondo_barra.jpg);color:white;'),
            'headerIcon' => 'user',
            'content' => $this->renderPartial('_form', array('form' => $form, 'model' => $model), TRUE),
                )
        );
        ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?php
        $this->widget(
                'booster.widgets.TbPanel', array(
            'title' => 'Listar Grupo Familiar',
            'context' => 'primary',
            // 'headerHtmlOptions' => array('style' => 'background:url(' . Yii::app()->request->baseUrl . '/img/fondo_barra.jpg);color:white;'),
            'headerIcon' => 'user',
            'content' => $this->renderPartial('_listardatos', array('form' => $form), TRUE),
                )
        );
        ?>
    </div>
</div>

<div class="well">
    <div class="pull-center" style="text-align: right;">
        <?php
        $this->widget('booster.widgets.TbButton', array(
            'buttonType' => 'button',
            'icon' => 'glyphicon glyphicon-floppy-saved',
            'size' => 'large',
            'id' => 'GuardarFamiliar',
            'context' => 'primary',
            'label' => 'Agregar Familiar',
        ));
        ?>
    </div>
</div>

<?php //echo $this->renderPartial('_form', array('model'=>$model));  ?>

<?php $this->endWidget(); ?>


