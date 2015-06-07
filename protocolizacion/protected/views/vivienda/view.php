<?php
$this->breadcrumbs=array(
	'Viviendas'=>array('index'),
	$model->id_vivienda,
);

$this->menu=array(
array('label'=>'List Vivienda','url'=>array('index')),
array('label'=>'Create Vivienda','url'=>array('create')),
array('label'=>'Update Vivienda','url'=>array('update','id'=>$model->id_vivienda)),
array('label'=>'Delete Vivienda','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_vivienda),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Vivienda','url'=>array('admin')),
);
?>

<h1>View Vivienda #<?php echo $model->id_vivienda; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_vivienda',
		'tipo_vivienda_id',
		'unidad_habitacional_id',
		'construccion_mt2',
		'nro_piso',
		'nro_vivienda',
		'sala',
		'comedor',
		'lavandero',
		'lindero_norte',
		'lindero_sur',
		'lindero_este',
		'lindero_oeste',
		'coordenadas',
		'precio_vivienda',
		'nro_estacionamientos',
		'descripcion_estac',
		'nro_habitaciones',
		'nro_banos',
		'fuente_datos_entrada_id',
		'estatus_vivienda_id',
		'cocina',
		'fecha_creacion',
		'fecha_actualizacion',
		'usuario_id_creacion',
		'usuario_id_actualizacion',
),
)); ?>
