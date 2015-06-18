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

<?php
if (isset($sms) && !empty($sms)) {
    $user = Yii::app()->getComponent('user');
    $user->setFlash(
            'warning', "<strong>Ya existe una oficina con este nombre.</strong>"
    );
    $this->widget('booster.widgets.TbAlert', array(
        'fade' => true,
        'closeText' => '&times;', // false equals no close link
        'events' => array(),
        'htmlOptions' => array(),
        'userComponentId' => 'user',
        'alerts' => array(// configurations per alert type
            'warning' => array('closeText' => false),
        ),
    ));
}
?>

<h1 class="text-center">Registrar Oficina</h1>

<?php #echo $this->renderPartial('_form', array('model'=>$model)); ?>

<div class="row">
    <div class="col-md-12">
    <?php 
    $this->widget(
            'booster.widgets.TbPanel', array(
        'title' => 'Oficina',
        'context' => 'info',
        'headerIcon' => 'home',
        'content' => $this->renderPartial('_form', array('form' => $form, 'model' => $model, 'estado' => $estado, 'municipio' => $municipio, 'parroquia' => $parroquia), TRUE),
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
        <?php
            $this->widget('booster.widgets.TbButton', array(
                'context' => 'danger',
                'label' => 'Cancelar',
                'size' => 'large',
                'id' => 'CancelarForm',
                'icon' => 'ban-circle',
                'htmlOptions' => array(
                    'onclick' => 'document.location.href ="' . $this->createUrl('/') . '";'
                )
            ));
        ?>
    </div>
</div>
<?php  $this->endWidget(); ?>