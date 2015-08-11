
<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => 'asignacion-censo-form',
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
if (!empty($model->desarrollo_id)) {
    $id_desarrollo = Desarrollo::model()->findByPk($model->desarrollo_id); // consulta en la tabla ciudad el id_ciudad y id_estado 
    $id_parroquia = $id_desarrollo->parroquia_id;
    $id_municipio = $id_desarrollo->fkParroquia->clvmunicipio0->clvcodigo;
    $id_estado = $id_desarrollo->fkParroquia->clvmunicipio0->clvestado0->clvcodigo;

//    var_dump($model->desarrollo_id); die();
}
?>
<?php
$baseUrl = Yii::app()->baseUrl;
$numeros = Yii::app()->getClientScript()->registerScriptFile($baseUrl . '/js/js_jquery.numeric.js');
$mascara = Yii::app()->getClientScript()->registerScriptFile($baseUrl . '/js/jquery.mask.min.js');?>

<?php Yii::app()->clientScript->registerScript('reasignacion', "
    $(document).ready(function(){
         $('#AsignacionCenso_cedula').numeric();
    });
         $('#guardarAsignacion').click(function(){
     
                if ($('#AsignacionCenso_fecha_asignacion').val()==''){
                    bootbox.alert('Por favor indique la fecha de asignación');
                    return false;
                }
                if ($('#AsignacionCenso_nacionalidad').val()==''){
                    bootbox.alert('Por favor indique la nacionalidad');
                    return false;
                }
                if ($('#AsignacionCenso_cedula').val()==''){
                    bootbox.alert('Por favor indique la cedula');
                    return false;
                }
            });
             
    $(document).ready(function(){
            $('#Tblestado_clvcodigo').val(" . $id_estado . ");
 
            $.get('" . CController::createUrl('ValidacionJs/BuscarMunicipios') . "', {clvcodigo: " . $id_estado . " }, function(data){
                $('#Tblmunicipio_clvcodigo').html(data);
                $('#Tblmunicipio_clvcodigo').val(" . $id_municipio . ");
                
            });
            $.get('" . CController::createUrl('ValidacionJs/BuscarParroquias') . "', {municipio: " . $id_municipio . "}, function(data){
                $('#Tblparroquia_clvcodigo').html(data);
                $('#Tblparroquia_clvcodigo').val(" . $id_parroquia . ");
            });
           
            $.get('" . CController::createUrl('ValidacionJs/BuscarDesarrollo') . "', {desarrollo: " . $id_parroquia . "}, function(data){
                $('#AsignacionCenso_desarrollo_id').html(data);
                $('#AsignacionCenso_desarrollo_id').val(" . $model->desarrollo_id . ");
            });
        });

") ?>

<h1 class="text-center">Re-Asignación de Censo</h1>

<?php #echo $this->renderPartial('_form', array('model'=>$model)); ?>

<?php
$this->widget(
        'booster.widgets.TbLabel', array(
    'context' => 'warning',
    'htmlOptions' => array('style' => 'padding:3px;text-aling:center; font-size:13px; span{color:red;}'),
    // 'success', 'warning', 'important', 'info' or 'inverse'
    'label' => 'Los campos marcados con * son requeridos',
        )
);
?>
<br><br>

<div>
    <?php
    $this->widget(
            'booster.widgets.TbPanel', array(
        'title' => 'Re-Asignación de Censo',
        'context' => 'danger',
        'headerHtmlOptions' => array('style' => 'background-color: #1fb5ad !important;color: #FFFFFF !important;'),
        'headerIcon' => 'user',
        'headerHtmlOptions' => array('style' => 'background-color: #1fb5ad !important;color: #FFFFFF !important;'),
        'content' => $this->renderPartial('_reasignacion_censo', array('form' => $form, 'model' => $model, 'estado' => $estado, 'municipio' => $municipio, 'parroquia' => $parroquia), TRUE),
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
            'id' => 'guardarAsignacion',
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
                'onclick' => 'document.location.href ="' . $this->createUrl('/vswAsignacionCenso/admin') . '";'
            )
        ));
        ?>
    </div>
</div>
<?php $this->endWidget(); ?>