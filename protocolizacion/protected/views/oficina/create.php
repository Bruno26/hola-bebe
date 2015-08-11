<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => 'oficina-form',
    'enableAjaxValidation' => false,
    'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
        'validateOnChange' => true,
        'validateOnType' => true,
        )));
?>
<?php
$baseUrl = Yii::app()->baseUrl;
$numeros = Yii::app()->getClientScript()->registerScriptFile($baseUrl . '/js/js_jquery.numeric.js');
$mascara = Yii::app()->getClientScript()->registerScriptFile($baseUrl . '/js/jquery.mask.min.js');?>
<?php 
Yii::app()->clientScript->registerScript('oficina', "
    $(document).ready(function(){
         $('#Oficina_cedula').numeric();
    });   
    
   $('#guardar').click(function(){
        if( $.trim($('#Oficina_nombre').val())  == ''){
            $('#Oficina_nombre').val('');
            bootbox.alert('Indique el nombre de la Oficina.');
            return false;
        }
        if( $('#Oficina_cedula').val() == ''){
            bootbox.alert('Indique el nombre de la Oficina.');
            return false;
        }
        if( $('#Oficina_cedula').val() == ''){
            bootbox.alert('Indique la Cédula del Jefe de la Oficina.');
            return false;
        }

      
   });
");
?>



<h1 class="text-center">Cargar Nueva Oficina</h1>

<?php
if (isset($sms) && !empty($sms)) {
    $user = Yii::app()->getComponent('user');
    $user->setFlash(
            'warning', "<strong>Ya existe una Oficina con este nombre asociada a este Estado.</strong>"
    );
    $this->widget('booster.widgets.TbAlert', array(
        'fade' => true,
        'closeText' => '&times;', // false equals no close link
        'events' => array(),
        'htmlOptions' => array(),
        'userComponentId' => 'user',
        'alerts' => array(// configurations per alert type
            'warning' => array('closeText' => false),
        ),
    ));
}

        $this->widget(
                'booster.widgets.TbLabel', array(
            'context' => 'warning',
            'htmlOptions' => array('style' => 'padding:3px;text-aling:center; font-size:13px; span{color:red;}'),
            // 'success', 'warning', 'important', 'info' or 'inverse'
            'label' => 'Los campos marcados con * son requeridos',
                )
        ); ?>
        <br><br>

<div class="row">
    <div class="col-md-12">
        <?php
        $this->widget(
                'booster.widgets.TbPanel', array(
            'title' => 'Oficina',
            'context' => 'info',
            'headerIcon' => 'home',
            'headerHtmlOptions' => array('style' => 'background-color: #1fb5ad !important;color: #FFFFFF !important;'),
            'content' => $this->renderPartial('_form', array('form' => $form, 'model' => $model, 'estado' => $estado, 'municipio' => $municipio, 'parroquia' => $parroquia), TRUE),
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
            'title' => 'Datos del Jefe de Oficina',
            'context' => 'info',
            'headerIcon' => 'user',
            'headerHtmlOptions' => array('style' => 'background-color: #1fb5ad !important;color: #FFFFFF !important;'),
            'content' => $this->renderPartial('_form_jefe_oficina', array('form' => $form, 'model' => $model), TRUE),
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

<div class="row">
    <div class="col-md-12">
        <?php
        $this->widget(
                'booster.widgets.TbPanel', array(
            'title' => 'Listado de Oficinas Registradas',
            'context' => 'info',
            'headerIcon' => 'home',
            'headerHtmlOptions' => array('style' => 'background-color: #1fb5ad !important;color: #FFFFFF !important;'),
            'content' => $this->renderPartial('_form_listado_oficina', array('form' => $form,'model' => $model), TRUE),
                )
        );
        ?>
    </div>
</div>
<?php $this->endWidget(); ?>
