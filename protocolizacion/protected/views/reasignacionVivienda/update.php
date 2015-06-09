<?php
$this->breadcrumbs=array(
	'Reasignacion Viviendas'=>array('index'),
	$model->id_reasignacion_vivienda=>array('view','id'=>$model->id_reasignacion_vivienda),
	'Update',
);

	$this->menu=array(
	array('label'=>'List ReasignacionVivienda','url'=>array('index')),
	array('label'=>'Create ReasignacionVivienda','url'=>array('create')),
	array('label'=>'View ReasignacionVivienda','url'=>array('view','id'=>$model->id_reasignacion_vivienda)),
	array('label'=>'Manage ReasignacionVivienda','url'=>array('admin')),
	);
	?>

	<h1>Update ReasignacionVivienda <?php echo $model->id_reasignacion_vivienda; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>