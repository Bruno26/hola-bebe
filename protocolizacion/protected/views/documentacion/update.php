<?php
$this->breadcrumbs=array(
	'Documentacions'=>array('index'),
	$model->id_documentacion=>array('view','id'=>$model->id_documentacion),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Documentacion','url'=>array('index')),
	array('label'=>'Create Documentacion','url'=>array('create')),
	array('label'=>'View Documentacion','url'=>array('view','id'=>$model->id_documentacion)),
	array('label'=>'Manage Documentacion','url'=>array('admin')),
	);
	?>

	<h1>Update Documentacion <?php echo $model->id_documentacion; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>