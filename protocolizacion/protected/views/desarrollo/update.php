<?php
$this->breadcrumbs=array(
	'Desarrollos'=>array('index'),
	$model->id_desarrollo=>array('view','id'=>$model->id_desarrollo),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Desarrollo','url'=>array('index')),
	array('label'=>'Create Desarrollo','url'=>array('create')),
	array('label'=>'View Desarrollo','url'=>array('view','id'=>$model->id_desarrollo)),
	array('label'=>'Manage Desarrollo','url'=>array('admin')),
	);
	?>

	<h1>Update Desarrollo <?php echo $model->id_desarrollo; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>