<?php
$this->breadcrumbs=array(
	'Reasignacion Viviendas',
);

$this->menu=array(
array('label'=>'Create ReasignacionVivienda','url'=>array('create')),
array('label'=>'Manage ReasignacionVivienda','url'=>array('admin')),
);
?>

<h1>Reasignacion Viviendas</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
