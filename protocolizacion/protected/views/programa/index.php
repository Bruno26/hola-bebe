<?php
$this->breadcrumbs=array(
	'Programas',
);

$this->menu=array(
array('label'=>'Create Programa','url'=>array('create')),
array('label'=>'Manage Programa','url'=>array('admin')),
);
?>

<h1>Programas</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
