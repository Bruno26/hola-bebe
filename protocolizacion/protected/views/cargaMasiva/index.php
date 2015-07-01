<?php
$this->breadcrumbs=array(
	'Carga Masivas',
);

$this->menu=array(
array('label'=>'Create CargaMasiva','url'=>array('create')),
array('label'=>'Manage CargaMasiva','url'=>array('admin')),
);
?>

<h1>Carga Masivas</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
