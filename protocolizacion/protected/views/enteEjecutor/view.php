<?php
$this->breadcrumbs=array(
	'Ente Ejecutors'=>array('index'),
	$model->id_ente_ejecutor,
);

$this->menu=array(
array('label'=>'List EnteEjecutor','url'=>array('index')),
array('label'=>'Create EnteEjecutor','url'=>array('create')),
array('label'=>'Update EnteEjecutor','url'=>array('update','id'=>$model->id_ente_ejecutor)),
array('label'=>'Delete EnteEjecutor','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_ente_ejecutor),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage EnteEjecutor','url'=>array('admin')),
);
?>

<h1>View EnteEjecutor #<?php echo $model->id_ente_ejecutor; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_ente_ejecutor',
		'nombre_ente_ejecutor',
		'observaciones',
		'estatus',
		'fecha_creacion',
		'fecha_actualizacion',
		'usuario_id_creacion',
		'usuario_id_actualizacion',
),
)); ?>
