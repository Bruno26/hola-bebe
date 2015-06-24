<?php
$this->breadcrumbs=array(
	'Empadronador Censos'=>array('index'),
	$model->id_empadronador_censo,
);

$this->menu=array(
array('label'=>'List EmpadronadorCenso','url'=>array('index')),
array('label'=>'Create EmpadronadorCenso','url'=>array('create')),
array('label'=>'Update EmpadronadorCenso','url'=>array('update','id'=>$model->id_empadronador_censo)),
array('label'=>'Delete EmpadronadorCenso','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_empadronador_censo),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage EmpadronadorCenso','url'=>array('admin')),
);
?>

<h1>View EmpadronadorCenso #<?php echo $model->id_empadronador_censo; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_empadronador_censo',
		'asignacion_censo_id',
		'empadronador_usuario_id',
		'estatus',
		'usuario_creacion',
		'fecha_creacion',
		'usuario_modificacion',
		'fecha_actualizacion',
),
)); ?>
