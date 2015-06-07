<?php
$this->breadcrumbs=array(
	'Desarrollos'=>array('index'),
	$model->id_desarrollo,
);

$this->menu=array(
array('label'=>'List Desarrollo','url'=>array('index')),
array('label'=>'Create Desarrollo','url'=>array('create')),
array('label'=>'Update Desarrollo','url'=>array('update','id'=>$model->id_desarrollo)),
array('label'=>'Delete Desarrollo','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_desarrollo),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Desarrollo','url'=>array('admin')),
);
?>

<h1>View Desarrollo #<?php echo $model->id_desarrollo; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_desarrollo',
		'nombre',
		'parroquia_id',
		'descripcion',
		'urban_barrio',
		'av_call_esq_carr',
		'zona',
		'lindero_norte',
		'lindero_sur',
		'lindero_este',
		'lindero_oeste',
		'coordenadas',
		'lote_terreno_mt2',
		'fuente_financiamiento_id',
		'ente_ejecutor_id',
		'titularidad_del_terreno',
		'total_viviendas',
		'total_viviendas_protocolizadas',
		'fecha_transferencia',
		'fuente_datos_entrada_id',
		'fecha_creacion',
		'fecha_actualizacion',
		'usuario_id_creacion',
		'usuario_id_actualizacion',
		'programa_id',
		'total_unidades',
),
)); ?>
