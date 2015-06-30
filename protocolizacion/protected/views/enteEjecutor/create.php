

<h1>Cargar Nuevo Ente Ejecutor</h1>
<?php
if (isset($error) && !empty($error)) {
    $user = Yii::app()->getComponent('user');
    switch ($error) {
        case 1:
            $type = 'warning';
            $sms = "<strong>Ya existe un registro con este nombre.</strong>.";
            break;
        case 2:
            $type = 'info';
            $sms = "<strong>Por Favor Ingrese un nombre.</strong>.";
            break;
    }
    $user->setFlash(
            $type, $sms
    );
    $this->widget('booster.widgets.TbAlert', array(
        'fade' => true,
        'closeText' => '&times;', // false equals no close link
        'events' => array(),
        'htmlOptions' => array(),
        'userComponentId' => 'user',
        'alerts' => array(// configurations per alert type
            $type => array('closeText' => false),
        ),
    ));
}
?>
<?php
$this->widget(
        'booster.widgets.TbLabel', array(
    'context' => 'warning',
    'htmlOptions' => array('style' => 'padding:3px;text-aling:center; font-size:13px; span{color:red;}'),
    // 'success', 'warning', 'important', 'info' or 'inverse'
    'label' => 'Los campos marcados con * son requeridos',
        )
);
?>
<br><br>

<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => 'EnteEjecutor-form',
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
            'title' => 'Ente Ejecutor',
            'context' => 'info',
            'headerHtmlOptions' => array('style' => 'background-color: #1fb5ad !important;color: #FFFFFF !important;'),
            'headerIcon' => 'home',
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
              'label' => 'Registrar',
        ));
        ?>
    </div>
</div>

<?php //echo $this->renderPartial('_form', array('model'=>$model));  ?>

<?php $this->endWidget(); ?>


<div class="row">
    <div class='col-md-12'>
        <?php
        $this->widget(
                'booster.widgets.TbExtendedGridView', array(
            'type' => 'striped bordered',
            'responsiveTable' => true,
            'id' => 'listado_servicios',
            'dataProvider' => new CActiveDataProvider('EnteEjecutor', array(
                'pagination' => array(
                    'pageSize' => 5,
                ),
                    )),
//            'template' => "{items}",
            'columns' => array(
                array(
                    'name' => 'nombre_ente_ejecutor',
                    'header' => 'Listado de Ente Ejecutor',
                    'value' => '$data->nombre_ente_ejecutor',
                ),
                array(
                    'name' => 'observaciones',
                    'header' => 'Observaciones',
                    'value' => '$data->observaciones',
                ),
            )
                )
        );
        ?>
    </div>
</div>