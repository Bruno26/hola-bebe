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

$this->widget('booster.widgets.TbProgress', array(
    'striped' => true,
    'animated' => true,
    'stacked' => array(
        array(
            'context' => 'warning',
            'percent' => 30,
            'htmlOptions' => array(
                'data-toggle' => 'tooltip',
                'data' => 'Paso 1',
                'title' => 'Paso 1'
            )
        ), 
        array('context' => 'info',
            'percent' => 35,
            'htmlOptions' => array(
                'data-toggle' => 'tooltip',
                'title' => 'Paso 2'
            )
        ),

        array('context' => 'danger', 
            'percent' => 35,
            'animated' => true,
            'htmlOptions' => array(
                'data-toggle' => 'tooltip',
                'title' => 'Paso 3'
            )
        ), 
    )
        )
);
?>
<?php
$baseUrl = Yii::app()->baseUrl;
$Validaciones = Yii::app()->getClientScript()->registerScriptFile($baseUrl . '/js/jquery.mask.min');
$Validacion = Yii::app()->getClientScript()->registerScriptFile($baseUrl . '/js/js_jquery.numeric.js');
Yii::app()->clientScript->registerScript('telefono', "
        $(document).ready(function(){
            $('#Beneficiario_telefono_trabajo').numeric();  
            $('#Beneficiario_ingreso_declarado').numeric();         
        
  
        }),
        
         $('#guardar').click(function(){
         if($('#Tblestado_clvcodigo').val()==''){
                    bootbox.alert('Por favor indique Estado');
                    return false;
         }    
         if($('#Tblmunicipio_clvcodigo').val()==''){
                    bootbox.alert('Por favor indique Municipio');
                    return false;
         }    
         if($('#Beneficiario_parroquia_id').val()==''){
                    bootbox.alert('Por favor indique Parroquia');
                    return false;
         }    
         if($('#Beneficiario_urban_barrio').val()==''){
                    bootbox.alert('Por favor indique Urbanización/Barrio');
                    return false;
         }    
         
         if($('#Beneficiario_urban_barrio').val()==''){
                    bootbox.alert('Por favor indique Urbanización/Barrio');
                    return false;
         }    
         
         if($('#Beneficiario_av_call_esq_carr').val()==''){
                    bootbox.alert('Por favor indique Avenida/Calle/Esquina/Carretera');
                    return false;
         }    
        
         if($('#Beneficiario_condicion_trabajo_id').val()==''){
                    bootbox.alert('Por favor indique Condición de trabajo');
                    return false;
         }    
         if($('#Beneficiario_fuente_ingreso_id').val()==''){
                    bootbox.alert('Por favor indique fuente de ingreso');
                    return false;
         }    
         if($('#Beneficiario_ingreso_declarado').val()==''){
                    bootbox.alert('Por favor indique ingreso declarado');
                    return false;
         }  
         
        
         
        }),
        
        
  
        ");
?>

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
            'headerHtmlOptions' => array('style' => 'background-color: #1fb5ad !important;color: #FFFFFF !important;'),
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
            'headerHtmlOptions' => array('style' => 'background-color: #1fb5ad !important;color: #FFFFFF !important;'),                        
            'context' => 'primary',
            'headerIcon' => 'briefcase',
            'content' => $this->renderPartial('_datosLaborales', array('form' => $form, 'model' => $model), TRUE),
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
            'label' => $model->isNewRecord ? 'Finalizar' : 'Finalizar',
        ));
        ?>
    </div>
</div>




<?php $this->endWidget(); ?>
