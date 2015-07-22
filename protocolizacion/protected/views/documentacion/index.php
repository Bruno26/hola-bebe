<?php
$this->breadcrumbs=array(
	'Documentacions',
);

$this->menu=array(
array('label'=>'Create Documentacion','url'=>array('create')),
array('label'=>'Manage Documentacion','url'=>array('admin')),
);
?>

<h1>Documentacions</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
