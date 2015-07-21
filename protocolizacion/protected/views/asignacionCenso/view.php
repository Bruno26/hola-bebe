<?php
$this->breadcrumbs=array(
	'Asignacion Censos'=>array('index'),
	$model->id_asignacion_censo,
);


?>

<h1>Detalle Asignación de Censo</h1>



<?php $this->widget('booster.widgets.TbPanel', array(
    'context' => 'primary',
    'content' => $this->renderPartial('_view', array('model' => $model), TRUE),
        )
);
?>

<div class="row text-right" style="margin-right: 1em">
    <?php
    $this->widget('booster.widgets.TbButton', array(
        'buttonType' => 'button',
        'context' => 'danger',
        'size' => 'large',
        'label' => 'Regresar',
        'htmlOptions' => array(
            'onclick' => 'document.location.href ="' . $this->createUrl('/vswAsignacionCenso/admin') . '"',
        )
    ));
    ?>
    </div>