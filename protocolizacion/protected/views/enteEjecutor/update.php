<?php
$this->breadcrumbs=array(
	'Ente Ejecutors'=>array('index'),
	$model->id_ente_ejecutor=>array('view','id'=>$model->id_ente_ejecutor),
	'Update',
);

	$this->menu=array(
	array('label'=>'List EnteEjecutor','url'=>array('index')),
	array('label'=>'Create EnteEjecutor','url'=>array('create')),
	array('label'=>'View EnteEjecutor','url'=>array('view','id'=>$model->id_ente_ejecutor)),
	array('label'=>'Manage EnteEjecutor','url'=>array('admin')),
	);
	?>

	<h1>Update EnteEjecutor <?php echo $model->id_ente_ejecutor; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>