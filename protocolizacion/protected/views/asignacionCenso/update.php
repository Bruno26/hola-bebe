<?php
$this->breadcrumbs=array(
	'Asignacion Censos'=>array('index'),
	$model->id_asignacion_censo=>array('view','id'=>$model->id_asignacion_censo),
	'Update',
);

	$this->menu=array(
	array('label'=>'List AsignacionCenso','url'=>array('index')),
	array('label'=>'Create AsignacionCenso','url'=>array('create')),
	array('label'=>'View AsignacionCenso','url'=>array('view','id'=>$model->id_asignacion_censo)),
	array('label'=>'Manage AsignacionCenso','url'=>array('admin')),
	);
	?>

	<h1>Update AsignacionCenso <?php echo $model->id_asignacion_censo; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>