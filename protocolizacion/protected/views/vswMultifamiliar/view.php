<?php
$this->breadcrumbs=array(
	'Vsw Multifamiliars'=>array('index'),
	$model->id_desarrollo,
);

$this->menu=array(
array('label'=>'List VswMultifamiliar','url'=>array('index')),
array('label'=>'Create VswMultifamiliar','url'=>array('create')),
array('label'=>'Update VswMultifamiliar','url'=>array('update','id'=>$model->id_desarrollo)),
array('label'=>'Delete VswMultifamiliar','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_desarrollo),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage VswMultifamiliar','url'=>array('admin')),
);
?>

<h1>View VswMultifamiliar #<?php echo $model->id_desarrollo; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_desarrollo',
		'nombre_desarrollo',
		'id_unidad_habitacional',
		'nombre_unidad_habitacional',
		'cod_estado',
		'estado',
		'cantidad_vivienda',
		'id_estatus',
		'estatus',
),
)); ?>
