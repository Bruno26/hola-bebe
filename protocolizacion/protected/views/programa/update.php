<?php
$this->breadcrumbs=array(
	'Programas'=>array('index'),
	$model->id_programa=>array('view','id'=>$model->id_programa),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Programa','url'=>array('index')),
	array('label'=>'Create Programa','url'=>array('create')),
	array('label'=>'View Programa','url'=>array('view','id'=>$model->id_programa)),
	array('label'=>'Manage Programa','url'=>array('admin')),
	);
	?>

	<h1>Update Programa <?php echo $model->id_programa; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>