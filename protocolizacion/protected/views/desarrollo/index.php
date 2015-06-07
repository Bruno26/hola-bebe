<?php
$this->breadcrumbs=array(
	'Desarrollos',
);

$this->menu=array(
array('label'=>'Create Desarrollo','url'=>array('create')),
array('label'=>'Manage Desarrollo','url'=>array('admin')),
);
?>

<h1>Desarrollos</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
