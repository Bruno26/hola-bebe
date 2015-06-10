<?php
$this->breadcrumbs=array(
	'Grupo Familiars'=>array('index'),
	$model->id_grupo_familiar,
);

$this->menu=array(
array('label'=>'List GrupoFamiliar','url'=>array('index')),
array('label'=>'Create GrupoFamiliar','url'=>array('create')),
array('label'=>'Update GrupoFamiliar','url'=>array('update','id'=>$model->id_grupo_familiar)),
array('label'=>'Delete GrupoFamiliar','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_grupo_familiar),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage GrupoFamiliar','url'=>array('admin')),
);
?>

<h1>View GrupoFamiliar #<?php echo $model->id_grupo_familiar; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_grupo_familiar',
		'unidad_familiar_id',
		'persona_id',
		'gen_parentesco_id',
		'tipo_sujeto_atencion',
		'ingreso_mensual',
		'fuente_datos_entrada_id',
		'cotiza_faov',
		'fecha_creacion',
		'fecha_actualizacion',
		'usuario_id_creacion',
		'usuario_id_actualizacion',
		'estatus',
),
)); ?>
