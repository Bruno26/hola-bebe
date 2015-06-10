<?php
/*
$this->breadcrumbs=array(
	'Programas'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Programa','url'=>array('index')),
array('label'=>'Manage Programa','url'=>array('admin')),
);*/
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

<h1>Registrar Programa</h1>

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
        'content' => $this->renderPartial('_form', array('form' => $form, 'model' => $model), TRUE),
        #'content' => $this->renderPartial('_form', array('model'=>$model),TRUE),
            )
    );
    ?>
    </div>
</div>

<div class="form-actions text-center">
        <?php
        $this->widget('booster.widgets.TbButton', array(
            'buttonType' => 'submit',
            'icon' => 'glyphicon glyphicon-floppy-saved',
            'size' => 'large',
            'id' => 'guardar',
            'context' => 'primary',
            'label' => 'Registrar',
        ));
        ?>
</div>
<?php  $this->endWidget(); ?>

<div class="row">
    <div class='col-md-12'>
        <?php
        $this->widget(
                'booster.widgets.TbExtendedGridView', array(
            'type' => 'striped bordered',
            'responsiveTable' => true,
            'id' => 'listado_servicios',
            'dataProvider' => new CActiveDataProvider('Programa', array(
                    )),
            'template' => "{items}",
            'columns' => array(
                array(
                    'name' => 'nombre_programa',
                    'header' => 'Listado de Programas',
                    'value' => '$data->nombre_programa',
                ),
            )
                )
        );
        ?>
    </div>
</div>