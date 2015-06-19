<?php
$this->breadcrumbs=array(
	'Beneficiario Temporals'=>array('index'),
	$model->id_beneficiario_temporal,
);

$this->menu=array(
array('label'=>'List BeneficiarioTemporal','url'=>array('index')),
array('label'=>'Create BeneficiarioTemporal','url'=>array('create')),
array('label'=>'Update BeneficiarioTemporal','url'=>array('update','id'=>$model->id_beneficiario_temporal)),
array('label'=>'Delete BeneficiarioTemporal','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_beneficiario_temporal),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage BeneficiarioTemporal','url'=>array('admin')),
);
?>

<h1>Detalle}loca de Adjudicado Temporal #<?php echo $model->id_beneficiario_temporal; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_beneficiario_temporal',
		'persona_id',
		'desarrollo_id',
		'unidad_habitacional_id',
		'id_control',
		'nacionalidad',
		'cedula',
		'nombre_completo',
		'nombre_archivo',
		'fecha_creacion',
		'fecha_actualizacion',
		'usuario_id_creacion',
		'usuario_id_actualizacion',
		'estatus',
),
)); ?>
