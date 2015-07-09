<?php
$this->breadcrumbs=array(
	'Vsw Unifamiliars'=>array('index'),
	$model->id_vivienda,
);

$this->menu=array(
array('label'=>'List VswUnifamiliar','url'=>array('index')),
array('label'=>'Create VswUnifamiliar','url'=>array('create')),
array('label'=>'Update VswUnifamiliar','url'=>array('update','id'=>$model->id_vivienda)),
array('label'=>'Delete VswUnifamiliar','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_vivienda),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage VswUnifamiliar','url'=>array('admin')),
);
?>

<h1>View VswUnifamiliar #<?php echo $model->id_vivienda; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_vivienda',
		'nro_vivienda',
		'tipo_vivienda_id',
		'tipo_vivienda',
		'id_unidad_habitacional',
		'nombre_unidad_habitacional',
		'id_desarrollo',
		'nombre_desarrollo',
		'cod_estado',
		'estado',
		'estatus_vivienda_id',
		'estatus',
),
)); ?>
