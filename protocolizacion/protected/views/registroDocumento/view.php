<?php
$this->breadcrumbs=array(
	'Registro Documentos'=>array('index'),
	$model->id_registro_documento,
);

$this->menu=array(
array('label'=>'List RegistroDocumento','url'=>array('index')),
array('label'=>'Create RegistroDocumento','url'=>array('create')),
array('label'=>'Update RegistroDocumento','url'=>array('update','id'=>$model->id_registro_documento)),
array('label'=>'Delete RegistroDocumento','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_registro_documento),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage RegistroDocumento','url'=>array('admin')),
);
?>

<h1>View RegistroDocumento #<?php echo $model->id_registro_documento; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_registro_documento',
		'analisis_credito_id',
		'registro_publico_id',
		'nro_registro',
		'fecha_registro',
		'tomo',
		'ano',
		'nro_protocolo',
		'nro_matricula',
		'fuente_datos_entrada_id',
		'estatus',
		'fecha_creacion',
		'fecha_actualizacion',
		'usuario_id_creacion',
		'usuario_id_actualizacion',
),
)); ?>
