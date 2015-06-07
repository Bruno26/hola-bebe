<?php
$this->breadcrumbs=array(
	'Beneficiarios'=>array('index'),
	$model->id_beneficiario,
);

$this->menu=array(
array('label'=>'List Beneficiario','url'=>array('index')),
array('label'=>'Create Beneficiario','url'=>array('create')),
array('label'=>'Update Beneficiario','url'=>array('update','id'=>$model->id_beneficiario)),
array('label'=>'Delete Beneficiario','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_beneficiario),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Beneficiario','url'=>array('admin')),
);
?>

<h1>View Beneficiario #<?php echo $model->id_beneficiario; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_beneficiario',
		'persona_id',
		'rif',
		'condicion_trabajo_id',
		'fuente_ingreso_id',
		'relacion_trabajo_id',
		'sector_trabajo_id',
		'nombre_empresa',
		'direccion_empresa',
		'telefono_trabajo',
		'gen_cargo_id',
		'ingreso_mensual',
		'ingreso_declarado',
		'ingreso_promedio_faov',
		'cotiza_faov',
		'direccion_anterior',
		'geo_estado_id',
		'geo_municipio_id',
		'geo_parroquia_id',
		'urban_barrio',
		'av_call_esq_carr',
		'zona',
		'fecha_ultimo_censo',
		'protocolizado',
		'fecha_creacion',
		'fecha_actualizacion',
		'usuario_id_creacion',
		'usuario_id_actualizacion',
		'estatus_beneficiario_id',
		'codigo_trab',
),
)); ?>
