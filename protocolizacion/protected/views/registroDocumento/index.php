<?php
$this->breadcrumbs=array(
	'Registro Documentos',
);

$this->menu=array(
array('label'=>'Create RegistroDocumento','url'=>array('create')),
array('label'=>'Manage RegistroDocumento','url'=>array('admin')),
);
?>

<h1>Registro Documentos</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
