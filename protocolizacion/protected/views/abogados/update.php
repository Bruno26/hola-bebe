
<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => 'abogados-form',
    'enableAjaxValidation' => false,
    'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
        'validateOnChange' => true,
        'validateOnType' => true,
    ),
        ));
?>
<?php Yii::app()->clientScript->registerScript('abogados', "
         $('#guardar').click(function(){
                if($('#Abogados_inpreabogado').val()==''){
                   bootbox.alert('Por favor indique el Inpreabogado');
                    return false;
                }
                if($('#Abogados_tipo_abogado_id').val()=='SELECCIONE'){
                   bootbox.alert('Por favor indique el Tipo de Abogado');
                    return false;
                }
                if($('#Abogados_oficina_id').val()==''){
                   bootbox.alert('Por favor indique la oficina');
                    return false;
                }

                });

        ") ?>
<h1>Modificar Agente de Documentación y Cobranzas</h1>
 <?php  $this->widget(
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
            'title' => 'Agente de Documentación y Cobranzas',
            'context' => 'danger',
            'headerHtmlOptions' => array('style' => 'background-color: #1fb5ad !important;color: #FFFFFF !important;'),
            'headerIcon' => 'globe',
            'content' => $this->renderPartial('_form_update', array('form' => $form, 'model' => $model, 'consulta' => $consulta), TRUE),
                )
        );
        ?>
    </div>
</div>

<div class="well">
    <div class="pull-center" style="text-align: right;">
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
        <?php
        $this->widget('booster.widgets.TbButton', array(
            'buttonType' => 'submit',
            'icon' => 'glyphicon glyphicon-floppy-saved',
            'size' => 'large',
            'id' => 'guardar',
            'context' => 'primary',
            'label' => $model->isNewRecord ? 'Guardar' : 'Actualizar',
        ));
        ?>
    </div>
</div>

<?php //echo $this->renderPartial('_form', array('model'=>$model));   ?>

<?php $this->endWidget(); ?>
