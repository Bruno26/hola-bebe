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
<?php Yii::app()->clientScript->registerScript('abogado', "  
        $('#guardar').click(function(){
            if($('#Abogados_tipo_abogado_id').val()==''){
              bootbox.alert('Por favor indique el tipo de agente');
                    return false;
            }
            if($('#Abogados_nacionalidad').val()==''){
              bootbox.alert('Por favor indique Nacionalidad');
                    return false;
            }
            if($('#Abogados_cedula').val()==''){
              bootbox.alert('Por favor indique la cédula');
                    return false;
            }
            if($('#Abogados_oficina_id').val()==''){
              bootbox.alert('Por favor indique la Oficina');
                    return false;
            }
        })
        "); ?>


<h1>Cargar Nuevo Agente de Documentación y Cobranzas</h1>

<?php 
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
            'title' => 'Agente de Documentación y Cobranza',
            'context' => 'info',
            'headerIcon' => 'user',
            'headerHtmlOptions' => array('style' => 'background-color: #1fb5ad !important;color: #FFFFFF !important;'),
            'content' => $this->renderPartial('_form', array('form' => $form, 'model' => $model), TRUE),
                #'content' => $this->renderPartial('_form', array('model'=>$model),TRUE),
                )
        );
        ?>
    </div>
</div>
<?php #echo $this->renderPartial('_form', array('model'=>$model));  ?>
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
<?php $this->endWidget(); ?>
