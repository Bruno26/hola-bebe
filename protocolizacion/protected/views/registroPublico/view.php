<?php
$this->breadcrumbs=array(
	'Registro Publicos'=>array('index'),
	$model->id_registro_publico,
);

$this->menu=array(
array('label'=>'List RegistroPublico','url'=>array('index')),
array('label'=>'Create RegistroPublico','url'=>array('create')),
array('label'=>'Update RegistroPublico','url'=>array('update','id'=>$model->id_registro_publico)),
array('label'=>'Delete RegistroPublico','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_registro_publico),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage RegistroPublico','url'=>array('admin')),
);
?>

<h1>View RegistroPublico #<?php echo $model->id_registro_publico; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_registro_publico',
		'nombre_registro_publico',
		'parroquia_id',
		'estatus',
		'fecha_creacion',
		'fecha_actualizacion',
		'usuario_id_creacion',
		'usuario_id_actualizacion',
),
)); ?>
