<?php
$this->breadcrumbs=array(
	'Viviendas'=>array('index'),
	$model->id_vivienda=>array('view','id'=>$model->id_vivienda),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Vivienda','url'=>array('index')),
	array('label'=>'Create Vivienda','url'=>array('create')),
	array('label'=>'View Vivienda','url'=>array('view','id'=>$model->id_vivienda)),
	array('label'=>'Manage Vivienda','url'=>array('admin')),
	);
	?>

	<h1>Update Vivienda <?php echo $model->id_vivienda; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>