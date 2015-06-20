<?php Yii::app()->clientScript->registerScript('desarrollo', "
         $('#guardarVivienda').click(function(){
         
                if($('#Tblestado_clvcodigo').val()==''){
                    bootbox.alert('Por favor seleccione Estado');
                    return false;
                }
                if($('#Tblmunicipio_clvcodigo').val()==''){
                   bootbox.alert('Por favor seleccione Municipio');
                    return false;
                }
                if($('#Tblparroquia_clvcodigo').val()==''){
                    bootbox.alert('Por favor seleccione Parroquia');
                    return false;
                }
                if($('#Desarrollo_id_desarrollo').val()==''){
                    bootbox.alert('Por favor seleccione el Desarrollo');
                    return false;
                }
                
                if($('#Vivienda_unidad_habitacional_id').val()==''){
                    bootbox.alert('Por favor seleccione nombre de la unidad habitacional');
                    return false;
                }
                if($('#Vivienda_tipo_vivienda_id').val()==''){
                    bootbox.alert('Por favor seleccione tipo de vivienda');
                    return false;
                }
                if($('#Vivienda_construccion_mt2').val()==''){
                    bootbox.alert('Por favor indique metros cuadrado de la vivienda');
                    return false;
                }
                
                if($('#Vivienda_nro_piso').val()==''){
                    bootbox.alert('Por favor indique número piso');
                    return false;
                }
                if($('#Vivienda_nro_vivienda').val()==''){
                    bootbox.alert('Por favor indique número de vivienda');
                    return false;
                }
                
                if($('#Vivienda_nro_habitaciones').val()==''){
                    bootbox.alert('Por favor indique número de habitacione');
                    return false;
                }
                
                if($('#Vivienda_nro_banos').val()==''){
                    bootbox.alert('Por favor indique número de baños');
                    return false;
                }
                
                if($('#Vivienda_precio_vivienda').val()==''){
                    bootbox.alert('Por favor indique precio vivienda');
                    return false;
                }
                
             
                
                
        });
         
        
        
        ") ?>

<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => 'vivienda-form',
    'enableAjaxValidation' => false,
    'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
        'validateOnChange' => true,
        'validateOnType' => true,
    ),
        ));
?>




<h1>Cargar Nueva Unidad Familiar</h1>

<div class="row">
    <div class="col-md-12">
        <?php
        $this->widget(
                'booster.widgets.TbPanel', array(
            'title' => 'Vivienda',
            'context' => 'info',
            // 'headerHtmlOptions' => array('style' => 'background:url(' . Yii::app()->request->baseUrl . '/img/fondo_barra.jpg);color:white;'),
            'headerIcon' => 'home',
            'content' => $this->renderPartial('_form', array('form' => $form, 'model' => $model, 'estado' => $estado, 'municipio' => $municipio, 'parroquia' => $parroquia, 'desarrollo' => $desarrollo), TRUE),
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
            'id' => 'guardarVivienda',
            'context' => 'primary',
            'label' => $model->isNewRecord ? 'Guardar' : 'Save',
        ));
        ?>
        <?php
            $this->widget('booster.widgets.TbButton', array(
                'context' => 'danger',
                'label' => 'Cancelar',
                'size' => 'large',
                'id' => 'CancelarForm',
                'icon' => 'ban-circle',
                'htmlOptions' => array(
                    'onclick' => 'document.location.href ="' . $this->createUrl('admin') . '";'
                )
            ));
        ?>
    </div>
</div>

<?php //echo $this->renderPartial('_form', array('model'=>$model)); ?>

<?php $this->endWidget(); ?>

