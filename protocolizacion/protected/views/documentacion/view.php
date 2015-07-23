<?php
$this->breadcrumbs=array(
	'Documentacions'=>array('index'),
	$model->id_documentacion,
);

$this->menu=array(
array('label'=>'List Documentacion','url'=>array('index')),
array('label'=>'Create Documentacion','url'=>array('create')),
array('label'=>'Update Documentacion','url'=>array('update','id'=>$model->id_documentacion)),
array('label'=>'Delete Documentacion','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_documentacion),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Documentacion','url'=>array('admin')),
);
?>

<h1>View Documentacion #<?php echo $model->id_documentacion; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_documentacion',
		'tipo_documento_id',
		'documento',
		'estatus',
		'fecha_creacion',
		'fecha_actualizacion',
		'usuario_id_creacion',
		'usuario_id_actualizacion',
),
)); ?>
