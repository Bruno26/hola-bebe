<?php
$this->breadcrumbs=array(
	'Ente Ejecutors',
);

$this->menu=array(
array('label'=>'Create EnteEjecutor','url'=>array('create')),
array('label'=>'Manage EnteEjecutor','url'=>array('admin')),
);
?>

<h1>Ente Ejecutors</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
