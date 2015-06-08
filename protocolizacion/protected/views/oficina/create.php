<?php
#$this->breadcrumbs=array(
#	'Oficinas'=>array('index'),
#	'Create',
#);

#$this->menu=array(
#array('label'=>'List Oficina','url'=>array('index')),
#array('label'=>'Manage Oficina','url'=>array('admin')),
#);
?>



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

<h1 class="text-center">Registrar Oficina</h1>

<?php #echo $this->renderPartial('_form', array('model'=>$model)); ?>

<div class="row">
    <div class="col-md-12">
    <?php 
    $this->widget(
            'booster.widgets.TbPanel', array(
        'title' => 'Oficina',
        'context' => 'primary',
        'headerIcon' => 'user',
        //'headerHtmlOptions' => array('style' => 'background-color: #B2D4F1 !important;color: #000000 !important;'),
        'content' => $this->renderPartial('_form', array('form' => $form, 'model' => $model, 'estado' => $estado, 'municipio' => $municipio, 'parroquia' => $parroquia), TRUE),
        #'content' => $this->renderPartial('_form', array('model'=>$model),TRUE),
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
<?php  $this->endWidget(); ?>