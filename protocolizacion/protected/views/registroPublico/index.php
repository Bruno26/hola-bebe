<?php
$this->breadcrumbs=array(
	'Registro Publicos',
);

$this->menu=array(
array('label'=>'Create RegistroPublico','url'=>array('create')),
array('label'=>'Manage RegistroPublico','url'=>array('admin')),
);
?>

<h1>Registro Publicos</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
