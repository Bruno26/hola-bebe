<?php /*
$this->breadcrumbs=array(
	'Registro Documentos'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List RegistroDocumento','url'=>array('index')),
array('label'=>'Manage RegistroDocumento','url'=>array('admin')),
);
*/?>

<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => 'registroDocumento-form',
    'enableAjaxValidation' => false,
    'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
        'validateOnChange' => true,
        'validateOnType' => true,
        )));
?>

<h1>Registro Documento</h1>


<div class="row">
    <div class="col-md-12">
        <?php
        $this->widget(
                'booster.widgets.TbPanel', array(
            'title' => 'Registro Documento',
            'context' => 'info',
            // 'headerHtmlOptions' => array('style' => 'background:url(' . Yii::app()->request->baseUrl . '/img/fondo_barra.jpg);color:white;'),
            'headerIcon' => 'file',
            'content' => $this->renderPartial('_form', array('form' => $form, 'model' => $model), TRUE),
                )
        );
        ?>
    </div>
</div>
<div class="well">
    <div class="pull-center" style="text-align: center;">
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

<?php //echo $this->renderPartial('_form', array('model'=>$model)); ?>

<?php $this->endWidget(); ?>


<div class="row">
    <div class='col-md-12'>
        <?php /*
        $this->widget(
                'booster.widgets.TbExtendedGridView', array(
            'type' => 'striped bordered',
            'responsiveTable' => true,
            'id' => 'listado_servicios',
            'dataProvider' => new CActiveDataProvider('registroDocumento', array(
                    )),
            'template' => "{items}",
            'columns' => array(
                array(
                    'name' => 'nombre_ente_ejecutor',
                    'header' => 'Listado de Ente Ejecutor',
                    'value' => '$data->nombre_ente_ejecutor',
                ),
            )
                )
        );
        */?>
    </div>
</div>

<?php #echo $this->renderPartial('_form', array('model'=>$model)); ?>
