<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => 'fuente-financiamiento-form',
    'enableAjaxValidation' => false,
        ));
?>

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
<h1 class="text-center">Cargar Nueva Fuente de Financiamiento</h1>


<div>
    <?php
    $this->widget(
            'booster.widgets.TbPanel', array(
        'title' => 'Fuente de Financiamiento',
        'context' => 'primary',
        'headerIcon' => 'user',
        'headerHtmlOptions' => array('style' => 'background-color: #1fb5ad !important;color: #FFFFFF !important;'),
        'content' => $this->renderPartial('_form', array('form' => $form, 'model' => $model), TRUE),
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
<?php
$this->endWidget();
?>
<div class="row">
    <div class='col-md-12'>
        <?php
        $this->widget(
                'booster.widgets.TbExtendedGridView', array(
            'type' => 'striped bordered',
            'responsiveTable' => true,
            'id' => 'listado_servicios',
            'dataProvider' => new CActiveDataProvider('FuenteFinanciamiento', array(
                    )),
            'template' => "{items}",
            'columns' => array(
                array(
                    'name' => 'nombre_fuente_financiamiento',
                    'header' => 'Listado de Fuente de Financiamiento',
                    'value' => '$data->nombre_fuente_financiamiento',
                ),
            )
                )
        );
        ?>
    </div>
</div>