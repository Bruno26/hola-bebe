<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => 'unidad-habitacional-form',
    'enableAjaxValidation' => false,
        ));
?>
<h1 class="text-center">Reasignación y Asignación</h1>

<?php #echo $this->renderPartial('_form', array('model'=>$model)); ?>

<div>
    <?php
    $this->widget(
            'booster.widgets.TbPanel', array(
        'title' => 'Reasignación y Asignación',
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
        'label' => 'Re-Asignación',
    ));
    ?>
</div>
<?php $this->endWidget(); ?>