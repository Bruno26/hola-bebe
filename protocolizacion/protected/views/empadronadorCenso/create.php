<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => 'empadronador-censo-form',
    'enableAjaxValidation' => false,
    'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
        'validateOnChange' => true,
        'validateOnType' => true,
    ),
        ));
?>


<h1 class="text-center">Asignar Censo a Empadronador</h1>
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
<div style="margin-bottom: 1%"></div>
<div class="row">
    <div class="col-md-12">
        <?php
        $this->widget(
                'booster.widgets.TbPanel', array(
            'title' => 'Asingación de empadronador',
            'headerHtmlOptions' => array('style' => 'background-color: #1fb5ad !important;color: #FFFFFF !important;'),
            'headerIcon' => 'home',
            'content' => $this->renderPartial('_asignacion', array('form' => $form, 'model' => $model, 'asignacionC' => $asignacionC, 'unidadHab' => $unidadHab, 'vistaEmpadronador'=>$vistaEmpadronador), TRUE),
                )
        );
        ?>
    </div>
</div>


<div class="form-actions">


    <div class="well">
        <div class="pull-center" style="text-align: right;">
       

            <?php
            $this->widget('booster.widgets.TbButton', array(
                'context' => 'danger',
                'label' => 'Cancelar',
                'size' => 'large',
                'id' => 'CancelarForm',
                'icon' => 'ban-circle',
                'htmlOptions' => array(
                    'onclick' => 'document.location.href ="' . $this->createUrl('/vswAsignacionCenso/admin') . '";'
                )
            ));
            ?>
        </div>
    </div>

    <?php $this->endWidget(); ?>

