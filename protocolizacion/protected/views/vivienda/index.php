<?php
$this->breadcrumbs=array(
	'Viviendas',
);

$this->menu=array(
array('label'=>'Create Vivienda','url'=>array('create')),
array('label'=>'Manage Vivienda','url'=>array('admin')),
);
?>

<h1>Viviendas</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
