
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
<h1 class="text-center">Asignación de Censo</h1>

<?php #echo $this->renderPartial('_form', array('model'=>$model)); ?>

<div>
    <?php
    $this->widget(
            'booster.widgets.TbPanel', array(
        'title' => 'Asignación de Censo',
        'context' => 'danger',
        'headerIcon' => 'user',
        'content' => $this->renderPartial('_form', array('form' => $form, 'model' => $model), TRUE),
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