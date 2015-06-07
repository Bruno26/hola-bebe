<?php
$this->breadcrumbs=array(
	'Fuente Financiamientos',
);

$this->menu=array(
array('label'=>'Create FuenteFinanciamiento','url'=>array('create')),
array('label'=>'Manage FuenteFinanciamiento','url'=>array('admin')),
);
?>

<h1>Fuente Financiamientos</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
