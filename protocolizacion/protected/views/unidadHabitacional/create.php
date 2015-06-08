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

<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => 'unidad-habitacional-form',
    'enableAjaxValidation' => false,
        ));
?>
<h1 class="text-center">Unidad Habitacional</h1>


<div>
    <?php
    $this->widget(
            'booster.widgets.TbPanel', array(
        'title' => 'Unidad Habitacional',
        'context' => 'danger',
        'headerIcon' => 'user',
        'headerHtmlOptions' => array('style' => 'background-color: #B2D4F1 !important;color: #000000 !important;'),
        'content' => $this->renderPartial('_form', array('form' => $form, 'model' => $model,'estado' => $estado, 'municipio' => $municipio, 'parroquia' => $parroquia ), TRUE),
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
            'id' => 'guardar',
            'context' => 'primary',
            'label' => $model->isNewRecord ? 'Guardar' : 'Save',
        ));
        ?>
    </div>
</div>
<?php $this->endWidget(); ?>