<?php
$this->breadcrumbs=array(
	'Asignacion Censos'=>array('index'),
	$model->id_asignacion_censo,
);

$this->menu=array(
array('label'=>'List AsignacionCenso','url'=>array('index')),
array('label'=>'Create AsignacionCenso','url'=>array('create')),
array('label'=>'Update AsignacionCenso','url'=>array('update','id'=>$model->id_asignacion_censo)),
array('label'=>'Delete AsignacionCenso','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_asignacion_censo),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage AsignacionCenso','url'=>array('admin')),
);
?>

<h1>View AsignacionCenso #<?php echo $model->id_asignacion_censo; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_asignacion_censo',
		'unidad_habitacional_id',
		'oficina_id',
		'persona_id',
		'fecha_asignacion',
		'censado',
		'estatus',
		'observaciones',
		'fecha_creacion',
		'fecha_actualizacion',
		'usuario_id_creacion',
		'usuario_id_actualizacion',
),
)); ?>
