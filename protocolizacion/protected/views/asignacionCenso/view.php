<?php
$this->breadcrumbs=array(
	'Asignacion Censos'=>array('index'),
	$model->id_asignacion_censo,
);


?>

<h1>Detalle Asignacion de Censo</h1>



<?php $this->widget('booster.widgets.TbPanel', array(
    'context' => 'primary',
    'content' => $this->renderPartial('_view', array('model' => $model), TRUE),
        )
);
?>