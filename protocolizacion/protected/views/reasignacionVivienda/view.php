<?php
$this->breadcrumbs=array(
	'Reasignacion Viviendas'=>array('index'),
	$model->id_reasignacion_vivienda,
);

$this->menu=array(
array('label'=>'List ReasignacionVivienda','url'=>array('index')),
array('label'=>'Create ReasignacionVivienda','url'=>array('create')),
array('label'=>'Update ReasignacionVivienda','url'=>array('update','id'=>$model->id_reasignacion_vivienda)),
array('label'=>'Delete ReasignacionVivienda','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_reasignacion_vivienda),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage ReasignacionVivienda','url'=>array('admin')),
);
?>

<h1>View ReasignacionVivienda #<?php echo $model->id_reasignacion_vivienda; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_reasignacion_vivienda',
		'beneficiario_id_anterior',
		'beneficiario_id_actual',
		'vivienda_id',
		'tipo_reasignacion_id',
		'persona_id_autoriza',
		'observaciones',
		'fecha_reasignacion',
		'fecha_creacion',
		'fecha_actualizacion',
		'usuario_id_creacion',
		'usuario_id_actualizacion',
		'estatus',
),
)); ?>
