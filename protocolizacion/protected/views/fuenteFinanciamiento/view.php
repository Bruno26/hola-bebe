<?php
$this->breadcrumbs=array(
	'Fuente Financiamientos'=>array('index'),
	$model->id_fuente_financiamiento,
);

$this->menu=array(
array('label'=>'List FuenteFinanciamiento','url'=>array('index')),
array('label'=>'Create FuenteFinanciamiento','url'=>array('create')),
array('label'=>'Update FuenteFinanciamiento','url'=>array('update','id'=>$model->id_fuente_financiamiento)),
array('label'=>'Delete FuenteFinanciamiento','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_fuente_financiamiento),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage FuenteFinanciamiento','url'=>array('admin')),
);
?>

<h1>View FuenteFinanciamiento #<?php echo $model->id_fuente_financiamiento; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_fuente_financiamiento',
		'nombre_fuente_financiamiento',
		'estatus',
		'fecha_creacion',
		'fecha_actualizacion',
		'usuario_id_creacion',
		'usuario_id_actualizacion',
),
)); ?>
