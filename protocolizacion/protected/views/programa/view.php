<?php
$this->breadcrumbs=array(
	'Programas'=>array('index'),
	$model->id_programa,
);

$this->menu=array(
array('label'=>'List Programa','url'=>array('index')),
array('label'=>'Create Programa','url'=>array('create')),
array('label'=>'Update Programa','url'=>array('update','id'=>$model->id_programa)),
array('label'=>'Delete Programa','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_programa),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Programa','url'=>array('admin')),
);
?>

<h1>Programa #<?php echo $model->id_programa; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'nombre_programa',
		
),
)); ?>
