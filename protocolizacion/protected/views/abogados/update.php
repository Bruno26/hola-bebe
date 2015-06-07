<?php
$this->breadcrumbs=array(
	'Abogadoses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Abogados','url'=>array('index')),
	array('label'=>'Create Abogados','url'=>array('create')),
	array('label'=>'View Abogados','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Abogados','url'=>array('admin')),
	);
	?>

	<h1>Update Abogados <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>