<?php
$this->breadcrumbs=array(
	'Carga Masivas'=>array('index'),
	$model->id_carga_masiva,
);

$this->menu=array(
array('label'=>'List CargaMasiva','url'=>array('index')),
array('label'=>'Create CargaMasiva','url'=>array('create')),
array('label'=>'Update CargaMasiva','url'=>array('update','id'=>$model->id_carga_masiva)),
array('label'=>'Delete CargaMasiva','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_carga_masiva),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage CargaMasiva','url'=>array('admin')),
);
?>

<h1>View CargaMasiva #<?php echo $model->id_carga_masiva;?></h1>

<?php
echo "Tamaño: ".$model->tamano($model->tamano_archivo); 
$this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_carga_masiva',
		'nombre_archivo',
		'num_lineas',
		'tamano_archivo',
		'mensajes_carga',
		'observaciones',
		'estatus',
		'tipo_carga_masiva',
		'fecha_inicio',
		'fecha_fin',
		'usuario_id_creacion',
),
)); ?>
