<?php
$this->breadcrumbs=array(
	'Oficinas',
);

$this->menu=array(
array('label'=>'Create Oficina','url'=>array('create')),
array('label'=>'Manage Oficina','url'=>array('admin')),
);
?>

<h1>Oficinas</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
