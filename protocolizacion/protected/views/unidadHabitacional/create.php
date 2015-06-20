<?php
//$this->breadcrumbs = array(
//    'Unidad Habitacionals' => array('index'),
//    'Create',
//);
//
//$this->menu = array(
//    array('label' => 'List UnidadHabitacional', 'url' => array('index')),
//    array('label' => 'Manage UnidadHabitacional', 'url' => array('admin')),
//);
?>
<?php Yii::app()->clientScript->registerScript('desarrollo', "
         $('#guardarUnidad').click(function(){
         
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
                if($('#UnidadHabitacional_desarrollo_id').val()==''){
                    bootbox.alert('Por favor seleccione el Desarrollo');
                    return false;
                }
                
                if($('#UnidadHabitacional_nombre').val()==''){
                    bootbox.alert('Por favor indique nombre de la unidad habitacional');
                    return false;
                }
                if($('#UnidadHabitacional_gen_tipo_inmueble_id').val()==''){
                    bootbox.alert('Por favor indique tipo de inmueble');
                    return false;
                }
                
             
                
                
        });
         
        
        
        ") ?>
<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => 'unidad-habitacional-form',
    'enableAjaxValidation' => false,
    'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
        'validateOnChange' => true,
        'validateOnType' => true,
    ),
        ));
?>
<h1 class="text-center">Cargar Nueva Unidad Multifamiliar</h1>

<?php
if (isset($sms) && !empty($sms)) {
    $user = Yii::app()->getComponent('user');
    $user->setFlash(
            'warning', "<strong>Ya existe una Unidad Habitacional con este Nombre en este Desarrollo.</strong>"
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
?>


<div>
    <?php
    $this->widget(
            'booster.widgets.TbPanel', array(
        'title' => 'Unidad Multifamiliar',
        'context' => 'danger',
        'headerIcon' => 'user',
//        'headerHtmlOptions' => array('style' => 'background-color: #B2D4F1 !important;color: #000000 !important;'),
        'content' => $this->renderPartial('_form', array('form' => $form, 'model' => $model, 'estado' => $estado, 'municipio' => $municipio, 'parroquia' => $parroquia), TRUE),
            )
    );
    ?>
</div>

<div class="well">
    <div class="pull-center" style="text-align: right;">
        <?php
        $this->widget('booster.widgets.TbButton', array(
            'buttonType' => 'submit',
            'icon' => 'glyphicon glyphicon-floppy-saved',
            'size' => 'large',
            'id' => 'guardarUnidad',
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
<?php $this->endWidget(); ?>