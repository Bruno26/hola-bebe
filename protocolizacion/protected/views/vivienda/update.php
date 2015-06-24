<?php
$this->breadcrumbs = array(
    'Viviendas' => array('index'),
    $model->id_vivienda => array('view', 'id' => $model->id_vivienda),
    'Update',
);
?>
<?php
if (!empty($model->unidad_habitacional_id)) {
    $id_unidad = UnidadHabitacional::model()->findByPk($model->unidad_habitacional_id);
    $id_desarrollo = $id_unidad->desarrollo_id; // consulta en la tabla ciudad el id_ciudad y id_estado 
    $id_parroquia = $id_unidad->desarrollo->parroquia_id;
    $id_municipio = $id_unidad->desarrollo->fkParroquia->clvmunicipio0->clvcodigo;
    $id_estado = $id_unidad->desarrollo->fkParroquia->clvmunicipio0->clvestado0->clvcodigo;
//    var_dump($id_parroquia);die;
// var_dump($id_desarrollo); die();
}
?>
<?php
Yii::app()->clientScript->registerScript('vivienda', "


        $(document).ready(function(){
         $('#Tblestado_clvcodigo').val(" . $id_estado . ");
          $.get('" . CController::createUrl('ValidacionJs/BuscarMunicipios') . "', {clvcodigo: " . $id_estado . "}, function(data){
                $('#Tblmunicipio_clvcodigo').html(data);
                $('#Tblmunicipio_clvcodigo').val(" . $id_municipio . ");
            });
          $.get('" . CController::createUrl('ValidacionJs/BuscarParroquias') . "', {municipio: " . $id_municipio . "}, function(data){
                $('#Tblparroquia_clvcodigo').html(data);
                $('#Tblparroquia_clvcodigo').val(" . $id_parroquia . ");
            });
          $.get('" . CController::createUrl('ValidacionJs/BuscarDesarrollo') . "', {desarrollo: " . $id_parroquia . "}, function(data){
                $('#Desarrollo_id_desarrollo').html(data);
                $('#Desarrollo_id_desarrollo').val(" . $id_desarrollo . ");
            });
            $.get('" . CController::createUrl('ValidacionJs/BuscarUnidadHabitacional') . "', {unidad: " . $id_desarrollo . "}, function(data){
                $('#Vivienda_unidad_habitacional_id').html(data);
                $('#Vivienda_unidad_habitacional_id').val(" . $model->unidad_habitacional_id . ");
            });
        });


     ");
?>
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

<div class="row">
    <div class="col-md-12">
        <?php
        $this->widget(
                'booster.widgets.TbPanel', array(
            'title' => 'Actualización de la vivienda N° ' . $model->id_vivienda,
            'context' => 'info',
            'headerHtmlOptions' => array('style' => 'background-color: #1fb5ad !important;color: #FFFFFF !important;'),
            'headerIcon' => 'globe',
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
            'icon' => 'glyphicon glyphicon glyphicon-step-backward',
            'size' => 'large',
            'id' => 'cancelar',
            'context' => 'danger',
            'label' => 'Cancelar',
            //'url' => $this->createURL('/desarrollo/admin'),
            'htmlOptions' => array(
                'onclick' => 'document.location.href ="' . $this->createUrl('vivienda/admin') . '"'),
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
