

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

<h1>Cargar Nuevo Registro Público</h1>

<?php #echo $this->renderPartial('_form', array('model'=>$model)); ?>

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
        'title' => 'Registro Público',
        'context' => 'info',
        'headerIcon' => 'user',
        'headerHtmlOptions' => array('style' => 'background-color: #1fb5ad !important;color: #FFFFFF !important;'),
        'content' => $this->renderPartial('_form', array('form' => $form, 'model' => $model, 'estado' => $estado, 'municipio' => $municipio, 'parroquia' => $parroquia), TRUE),
        #'content' => $this->renderPartial('_form', array('model'=>$model),TRUE),
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
<?php  $this->endWidget(); ?>


<div class="row">
    <div class='col-md-12'>
        <?php
        $this->widget(
                'booster.widgets.TbExtendedGridView', array(
            'type' => 'striped bordered',
            'responsiveTable' => true,
            'id' => 'listado_servicios',
            'dataProvider' => new CActiveDataProvider('registroPublico', array(
                    )),
            'template' => "{items}",
            'columns' => array(
                array(
                    'name' => 'nombre_registro_publico',
                    'header' => 'Listado de Registro Publico',
                    'value' => '$data->nombre_registro_publico',
                ),
            )
                )
        );
        ?>
    </div>
</div>