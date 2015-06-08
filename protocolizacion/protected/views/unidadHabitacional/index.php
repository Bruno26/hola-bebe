<?php
$this->breadcrumbs=array(
	'Unidad Habitacionals',
);

$this->menu=array(
array('label'=>'Create UnidadHabitacional','url'=>array('create')),
array('label'=>'Manage UnidadHabitacional','url'=>array('admin')),
);
?>

<h1>Unidad Habitacionals</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
