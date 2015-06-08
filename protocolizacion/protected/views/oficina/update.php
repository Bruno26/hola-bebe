<?php
$this->breadcrumbs=array(
	'Oficinas'=>array('index'),
	$model->id_oficina=>array('view','id'=>$model->id_oficina),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Oficina','url'=>array('index')),
	array('label'=>'Create Oficina','url'=>array('create')),
	array('label'=>'View Oficina','url'=>array('view','id'=>$model->id_oficina)),
	array('label'=>'Manage Oficina','url'=>array('admin')),
	);
	?>

	<h1>Update Oficina <?php echo $model->id_oficina; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>