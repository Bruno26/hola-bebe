<?php
$this->breadcrumbs=array(
	'Analisis Creditos',
);

$this->menu=array(
array('label'=>'Create AnalisisCredito','url'=>array('create')),
array('label'=>'Manage AnalisisCredito','url'=>array('admin')),
);
?>

<h1>Analisis Creditos</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
