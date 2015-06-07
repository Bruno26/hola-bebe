<?php
$this->breadcrumbs=array(
	'Beneficiarios'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Beneficiario','url'=>array('index')),
array('label'=>'Manage Beneficiario','url'=>array('admin')),
);
?>


<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => 'unidad-habitacional-form',
    'enableAjaxValidation' => false,
        ));
?>
<h1 class="text-center">Registrar Beneficiario</h1>

<?php #echo $this->renderPartial('_form', array('model'=>$model)); ?>

<div>
    <?php 
    $this->widget(
            'booster.widgets.TbPanel', array(
        'title' => 'Beneficiario',
        'context' => 'primary',
        'headerIcon' => 'user',
        'headerHtmlOptions' => array('style' => 'background-color: #B2D4F1 !important;color: #000000 !important;'),
        'content' => $this->renderPartial('_form', array('form' => $form, 'model' => $model), TRUE),
        #'content' => $this->renderPartial('_form', array('model'=>$model),TRUE),
            )
    );
    ?>
</div>

<div class="form-actions text-center">
    <?php
    $this->widget('booster.widgets.TbButton', array(
        'buttonType' => 'submit',
        'context' => 'primary',
        'size' => 'large',
        'label' => 'Registrar',
    ));
    ?>
</div>
<?php  $this->endWidget(); ?>