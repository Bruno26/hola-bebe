<?php
$this->breadcrumbs=array(
	'Abogadoses',
);

$this->menu=array(
array('label'=>'Create Abogados','url'=>array('create')),
array('label'=>'Manage Abogados','url'=>array('admin')),
);
?>

<h1>Abogadoses</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
